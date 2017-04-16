<?php
/*
  +------------------------------------------------------------------------+
  | Copyright (C) 2017 R3nza.com                                           |
  |                                                                        |
  | This program is free software; you can redistribute it and/or          |
  | modify it under the terms of the R3nza License                         |
  |                                                                        |
  +------------------------------------------------------------------------+
  | o Developer : Rain <serip88@gmail.com>                                 |
  | o HomePage  : http://www.toigiaitri.net/                               |
  | o Email     : serip88@gmail.com                                        |
  +------------------------------------------------------------------------+
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Area_lib extends Common_lib {
  	protected $CI = null ;
  	protected $_lang ;
	protected $_tag_type = 'area' ;
  	function __construct() {
      	$this->CI =& get_instance();
      	$this->CI->load->database('default');
      	$this->CI->load->model(array(
          	'tag/tag_model',
        ));
      	$this->_config =  $this->CI->config;
  	}
  	function validate_save_area($param){
	    $requite = array('name');//description,description_en,status,parent_id
	    $param['name'] 	= isset($param['name']) && $param['name'] ?$param['name']: '';
	    $param['name'] 	= str_replace('/', '-', $param['name']);
	    $param['status'] 	= isset($param['status']) && $param['status'] ? $param['status']: 0;   
	    $param['parent_id'] 	= isset($param['parent_id']) && $param['parent_id'] ? $param['parent_id']: 0;   
	    $param['description'] = isset($param['description']) && $param['description'] ? $param['description']: '';   
	    foreach ($requite as $key => $value) {
	      if(!$param[$value]){
	        return 0;
	      }
	    }
	    return $param;
	}

	function save_area($param){ 
	    $data = array();
	    $data['name'] 	= $param['name'];
	    $data['slug'] 		= $param['name'];
	    $data['parent_id'] 	= $param['parent_id'];
	    $data['description'] = $param['description'];
	    $data['path_parent'] = $param['path_parent'];
	    $data['path_parent_name'] = $param['path_parent_name'];
	    $data['type'] 		= $this->_tag_type;
	    $data['level'] 		= $param['level'];
	    $data['orders'] 		= 0;
	    $data['count'] 		= 0;
	    $data['enabled'] 	= $param['status']; 
	    $id = $this->CI->tag_model->insert_data($data);
	    return $id;
	}

}