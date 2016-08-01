<?php
/*
  +------------------------------------------------------------------------+
  | Copyright (C) 2016 Toigiaitri.                                        |
  |                                                                        |
  | This program is free software; you can redistribute it and/or          |
  | modify it under the terms of the Toigiaitri  License                      |
  |                                                                        |
  +------------------------------------------------------------------------+
  | o Developer : Rain                                                     |
  | o HomePage  : http://www.toigiaitri.net/                               |
  | o Email     : serip88@gmail.com                                        |
  +------------------------------------------------------------------------+
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Product_lib extends Common_lib {
  protected $CI = null;
  function __construct()
  {
    $this->CI =& get_instance();
    $this->CI->load->database('default');
    $this->CI->load->model(array(
        'product/Product_Model',
    ));
      
  }
  function validate_save_product($param){
      $requite = array('name_vn','name_en','parent_id');//description_vn,description_en,status,parent_id
      $param['name_vn']   = isset($param['name_vn']) && $param['name_vn'] ?$param['name_vn']: '';
      $param['name_vn']   = str_replace('/', '-', $param['name_vn']);
      $param['name_en']   = isset($param['name_en']) && $param['name_en'] ?$param['name_en']: '';  
      $param['name_en']   = str_replace('/', '-', $param['name_en']);
      $param['price']     = isset($param['price']) && $param['price'] ? str_replace('.','',$param['price']): 0;
      $param['price']     = intval(str_replace(',','',$param['price'])) ;
      $param['status']    = isset($param['status']) && $param['status'] ? $param['status']: 0;   
      $param['parent_id']   = isset($param['parent_id']) && $param['parent_id'] ? $param['parent_id']: 0;   
      $param['description_vn'] = isset($param['description_vn']) && $param['description_vn'] ? $param['description_vn']: '';   
      $param['description_en'] = isset($param['description_en']) && $param['description_en'] ? $param['description_en']: '';   
      foreach ($requite as $key => $value) {
        if(!$param[$value]){
          return 0;
        }
      }
      return $param;
  }

  function handle_save_product($param){
    //path_parent_id
    $this->CI->load->library(array('category_lib'));
    $param['path_category_id']=0;
    $param['level']=0;
    if($param['parent_id']){
      $category = $this->CI->category_lib->get_category($param['parent_id']);
      if($category['path_parent']){
        $param['path_category_id'] = $category['path_parent'].','.$param['parent_id'];
      }else{
        $param['path_category_id'] = $param['parent_id'];
      }
    }
    return $param;
  }
  function save_product($param){ 
    $data = array();
    $data['name_vn']  = $param['name_vn'];
    $data['name_en']  = $param['name_en'];
    $data['price']  = $param['price'];
    $data['slug']     = $param['name_vn'];
    $data['parent_id']  = $param['parent_id'];
    $data['description_vn'] = $param['description_vn'];
    $data['description_en'] = $param['description_en'];
    $data['path_category_id'] = $param['path_category_id'];
    $data['level']    = 0;
    $data['order']    = 0;
    $data['posted_date'] = time();
    $data['enabled']  = $param['status']; 
    $id = $this->CI->Product_Model->insert_data($data);
    return $id;
  }
  function get_product_list(){
      $select="product_id,name_vn,name_en,description_en,description_vn,image_name,image_path,price,enabled as status,parent_id";
      $where = array();
      $data = $this->CI->Product_Model->get_data($select,$where);      
      if($data){
        $data = $this->format_product_list($data);
      }
      return $data;
  }
  function validate_edit_product($param){
      $param = $this->validate_save_product($param);
      if($param){
        $param['product_id']  = isset($param['product_id']) && $param['product_id'] ?$param['product_id']: 0;
        if(!$param['product_id'])
          return 0;
      }
      return $param;
  }
  function edit_product($param){ 
      $data = array();
      $data['name_vn']  = $param['name_vn'];
      $data['name_en']  = $param['name_en'];
      $data['price']  = $param['price'];
      $data['slug']     = $param['name_vn'];
      $data['parent_id']  = $param['parent_id'];
      $data['description_vn'] = $param['description_vn'];
      $data['description_en'] = $param['description_en'];
      $data['path_category_id'] = $param['path_category_id'];
      $data['level']    = 0;
      $data['order']    = 0;
      $data['posted_date'] = time();
      $data['enabled']  = $param['status']; 
      if(isset($param['file_name_mb']) && $param['file_name_mb'] && isset($param['file_path_mb']) && $param['file_path_mb'] ){
        $data['image_name']  = $param['file_name_mb']; 
        $data['image_path'] = $param['file_path_mb']; 
      }

      if(isset($param['product_id']) && $param['product_id']){
        $where = array("product_id"=> $param['product_id']);
        $stt = $this->CI->Product_Model->update_data($data,$where); 
        return $stt;
      }else{
        return FALSE;
      }
  }
  function product_delete($product_id){
      if($product_id){
        $where = array("product_id"=>$product_id);
        $stt = $this->CI->Product_Model->delete_data($where);
        return $stt;
      }else
        return false;
  }
  //SUPPORT FUNCTION
  function format_product_list($data){
    foreach ($data as $key => $value) {
      if($value['price']){
        $data[$key]['price'] = number_format($value['price'] , 0, ',', '.');
      }
    }
    return $data;
  }
  //$file = array('name'=>'','path'=>'');
  function check_file_exit($file){
    $requite = array('name','path');
    foreach ($requite as $key => $value) {
      if(! isset($file[$value])){
        return 0;
      }
    }
    if(file_exists($file['path'])){
      return 1;
    }else{
      return 0;
    }
  }
  

}