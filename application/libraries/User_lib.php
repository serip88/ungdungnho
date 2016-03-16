<?php
/*
  +------------------------------------------------------------------------+
  | Copyright (C) 2015 Hanbiro Inc.                                        |
  |                                                                        |
  | This program is free software; you can redistribute it and/or          |
  | modify it under the terms of the Hanbiro  License                      |
  |                                                                        |
  +------------------------------------------------------------------------+
  | o Developer : Rain                                                     |
  | o HomePage  : http://www.hanbiro.com/                                  |
  | o Email     : vu.nguyen@hanbiro.com                                    |
  +------------------------------------------------------------------------+
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class User_lib {
  protected $CI = null ;
  protected $_lang ;

  function __construct() {
      $this->CI =& get_instance();
      $this->CI->load->database('default');
      $this->CI->load->model(array(
          'user/User_Group_Model',
          'user/User_Model',
          ));
      $this->_config =  $this->CI->config;
     $this->init_lang();
  }

  function init_lang(){
      $default_lang = isset($_COOKIE['language'])?$_COOKIE['language']:"vietnamese";
      $this->CI->load->language('user/user_controller',$default_lang);
      $this->_lang = $this->CI->lang->language;
      //return $this->_lang;
  }
  function get_user_list(){
    $select="user_id,username,status,date_added,user_group_id,firstname,lastname,email";
    $where = array();
    $data = $this->CI->User_Model->get_data($select,$where);
    return $data;
  }
  function format_user_list($data){
    foreach ($data as $key => $value) {
      list($date, $time) = explode(' ',$value['date_added']);
      $data[$key]['ui_date_added'] = $date;
      $data[$key]['ui_status'] =  $value['status']?$this->_lang['user_status_enabled']:$this->_lang['user_status_disabled'];
    }
    return $data;
  }
  function get_user($user_id){

    $select="A.user_id,A.user_group_id,A.username,A.salt,A.firstname,A.lastname,A.email,A.image,A.date_added,B.name";
    $tb_join = array();
    $tb_join[] = array('table_name'=>'user_group as B','condition'=>"A.user_group_id =B.user_group_id", 'type'=>'left');
    $where = array("A.user_id"=>$user_id);
    $data = $this->CI->User_Model->get_data_join($select,$where,$tb_join,1);
    if($data){
      return $data[0];
    }else{
      return 0;  
    }
  }
  function get_user_group(){

    $select="user_group_id as id,name";
    $where = array();
    $data = $this->CI->User_Group_Model->get_data($select,$where);
    return $data;
  }
  function validate_save_user($param){
    $requite = array('user_group_id','username','firstname','email','password','confirm');
    $param['user_group_id'] = isset($param['user_group_id']) && $param['user_group_id'] ?$param['user_group_id']: null;
    $param['username'] = isset($param['username']) && $param['username'] ?$param['username']: null;
    $param['firstname'] = isset($param['firstname']) && $param['firstname'] ?$param['firstname']: null;
    $param['lastname'] = isset($param['lastname']) && $param['lastname'] ?$param['lastname']: '';
    $param['email'] = isset($param['email']) && $param['email'] ?$param['email']: null;
    $param['password'] = isset($param['password']) && $param['password'] ?$param['password'] : null;
    $param['confirm'] = isset($param['confirm']) && $param['confirm'] ?$param['confirm']: null;
    $param['status'] = isset($param['status']) && $param['status'] ?$param['status']: 0;
    foreach ($requite as $key => $value) {
      if(!$param[$value]){
        return 0;
      }
    }
    if( !$param['password'] || ($param['password'] != $param['confirm'])){
      return 0;
    }
    return $param;
  }

  function save_user($param){
    $data =array();
    $data['user_group_id'] = $param['user_group_id'];
    $data['username'] = $param['username'];
    $data['firstname'] = $param['firstname'];
    $data['lastname'] = $param['lastname']; 
    $data['email'] = $param['email'];
    $data['salt'] = $this->generateRandomString();
    $data['password'] = md5($data['salt'].$param['password']);
    $data['code'] = '';
    $data['ip']   = '127.0.0.1';//$param['ip'];
    $data['date_added'] = date ( "Y-m-d H:i:s", time());
    $data['status'] = $param['status'];
    $id = $this->CI->User_Model->insert_data($data);
    return $id;
  }

  function validate_edit_user($param){
    $requite = array('user_group_id','firstname','email','user_id');

    $param['user_id'] = isset($param['user_id']) && $param['user_id'] ?$param['user_id']: null;
    $param['user_group_id'] = isset($param['user_group_id']) && $param['user_group_id'] ?$param['user_group_id']: null;
    $param['firstname'] = isset($param['firstname']) && $param['firstname'] ?$param['firstname']: null;
    $param['lastname'] = isset($param['lastname']) && $param['lastname'] ?$param['lastname']: '';
    $param['email'] = isset($param['email']) && $param['email'] ?$param['email']: null;
    $param['password'] = isset($param['password']) && $param['password'] ?$param['password']: null;
    $param['confirm'] = isset($param['confirm']) && $param['confirm'] ?$param['confirm']: null;
    $param['status'] = isset($param['status']) && $param['status'] ?$param['status']: 0;
    //if one in requite is null or '' or 0, it will be return false
    foreach ($requite as $key => $value) {
      if(!$param[$value]){
        return false;
      }
    }
    if($param['password'] && $param['password'] != $param['confirm']){
      return false;
    }
    return $param;
  }
  function edit_user($param){
    $data =array();
    $data['user_group_id'] = $param['user_group_id'];
    $data['firstname'] = $param['firstname'];
    $data['lastname'] = $param['lastname'];
    $data['email'] = $param['email'];
    if(isset($param['password']) && $param['password'] ){
      $data_user=$this->get_user($param['user_id']);
      if($data_user){
        if(!$data_user['salt']){
          $data_user['salt']= $this->generateRandomString();
          $data['salt'] = $data_user['salt'];
        }
        $data['password'] = md5($data_user['salt'].$param['password']);  
      }else{
        return FALSE;
      }
    }
    $data['code'] = 'code';
    $data['ip']   = '127.0.0.1';//$param['ip'];
    $data['updated_date'] = date ( "Y-m-d H:i:s", time());
    $data['status'] = $param['status'];
    if(isset($param['user_id']) && $param['user_id']){
      $where = array("user_id"=> $param['user_id']);
      $stt = $this->CI->User_Model->update_data($data,$where);
      return $stt;
    }else{
      return FALSE;
    }
    
  }
  function generateRandomString($length = 9) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
  }
  
}