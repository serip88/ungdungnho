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

class Category_lib extends Common_lib {
  	protected $CI = null ;
  	protected $_lang ;
	protected $_tag_type = 'category' ;
  	function __construct() {
      	$this->CI =& get_instance();
      	$this->CI->load->database('default');
      	$this->CI->load->model(array(
          	'tag/tag_model',
        ));
      	$this->_config =  $this->CI->config;
  	}
  	function validate_save_category($param){
	    $requite = array('name_vn','name_en');//description_vn,description_en,status,parent_id
	    $param['name_vn'] 	= isset($param['name_vn']) && $param['name_vn'] ?$param['name_vn']: '';
	    $param['name_vn'] 	= str_replace('/', '-', $param['name_vn']);
	    $param['name_en'] 	= isset($param['name_en']) && $param['name_en'] ?$param['name_en']: '';  
		$param['name_en'] 	= str_replace('/', '-', $param['name_en']);
	    $param['status'] 	= isset($param['status']) && $param['status'] ? $param['status']: 0;   
	    $param['parent_id'] 	= isset($param['parent_id']) && $param['parent_id'] ? $param['parent_id']: 0;   
	    $param['description_vn'] = isset($param['description_vn']) && $param['description_vn'] ? $param['description_vn']: '';   
	    $param['description_en'] = isset($param['description_en']) && $param['description_en'] ? $param['description_en']: '';   
	    foreach ($requite as $key => $value) {
	      if(!$param[$value]){
	        return 0;
	      }
	    }
	    return $param;
	}

	function save_category($param){ 
	    $data = array();
	    $data['name_vn'] 	= $param['name_vn'];
	    $data['name_en'] 	= $param['name_en'];
	    $data['slug'] 		= $param['name_vn'];
	    $data['parent_id'] 	= $param['parent_id'];
	    $data['description_vn'] = $param['description_vn'];
	    $data['description_en'] = $param['description_en'];
	    $data['path_parent'] = $param['path_parent'];
	    $data['path_parent_name_vn'] = $param['path_parent_name_vn'];
	    $data['path_parent_name_en'] = $param['path_parent_name_en'];
	    $data['type'] 		= $this->_tag_type;
	    $data['level'] 		= $param['level'];
	    $data['order'] 		= 0;
	    $data['count'] 		= 0;
	    $data['enabled'] 	= $param['status']; 
	    $id = $this->CI->Tag_Model->insert_data($data);
	    return $id;
	}

	function validate_edit_category($param){
	    $param = $this->validate_save_category($param);
	    if($param){
	    	$param['id'] 	= isset($param['id']) && $param['id'] ?$param['id']: 0;
	    	if(!$param['id'])
	    		return 0;
	    }
	    return $param;
	}
	function handle_save_category($param){
		//path_parent,level,path_parent_name_vn,path_parent_name_en
		$param['path_parent']=0;
		$param['path_parent_name_vn']=$param['name_vn'];
		$param['path_parent_name_en']=$param['name_en'];
		$param['level']=0;
		if($param['parent_id']){
			$category = $this->get_category($param['parent_id']);
			if($category['path_parent'] && $category['level']){
				$param['path_parent'] = $category['path_parent'].','.$category['id'];
				$param['path_parent_name_vn'] = $category['path_parent_name_vn'].'/'.$param['name_vn'];
				$param['path_parent_name_en'] = $category['path_parent_name_en'].'/'.$param['name_en'];
				$param['level'] = $category['level']+1;
			}else{
				$param['path_parent'] = $category['id'];
				$param['path_parent_name_vn'] = $category['name_vn'].'/'.$param['name_vn'];
				$param['path_parent_name_en'] = $category['name_en'].'/'.$param['name_en'];
				$param['level']=1;
			}
		}
		return $param;
	}
	function edit_category($param){ 
	    $data = array();
	    $data['name_vn'] 	= $param['name_vn'];
	    $data['name_en'] 	= $param['name_en'];
	    $data['slug'] 		= $param['name_vn'];
	    $data['parent_id'] 	= $param['parent_id'];
	    $data['description_vn'] = $param['description_vn'];
	    $data['description_en'] = $param['description_en'];
	    $data['path_parent'] = $param['path_parent'];
	    $data['path_parent_name_vn'] = $param['path_parent_name_vn'];
	    $data['path_parent_name_en'] = $param['path_parent_name_en'];
	    $data['type'] 		= $this->_tag_type;
	    $data['level'] 		= $param['level'];
	    $data['order'] 		= 0;
	    $data['enabled'] 	= $param['status']; 
	    if(isset($param['id']) && $param['id']){
	      $where = array("id"=> $param['id']);
	      $stt = $this->CI->Tag_Model->update_data($data,$where); 
	      return $stt;
	    }else{
	      return FALSE;
	    }
	}
	function get_category($id){
	    $select="id,name_vn,name_en,description_en,description_vn,enabled as status,path_parent,level,path_parent_name_vn,path_parent_name_en";
	    $where = array('id'=>$id, 'type'=>$this->_tag_type);
	    $data = $this->CI->Tag_Model->get_data($select,$where,1);
	    if($data){
	    	return $data[0];
	    }else{
	    	return 0;
	    }
	}
	function get_category_list(){
	    $select="id,parent_id,name_vn,name_en,description_en,description_vn,enabled as status,path_parent,level,path_parent_name_vn,path_parent_name_en";
	    $where = array('type'=>$this->_tag_type);
	    $data = $this->CI->tag_model->get_data($select,$where);
	    /*if($data){
	    	$data = $this->format_path_parent($data);
	    }*/
	    return $data;
	}
	function categorys_delete($category_id){
	    if($category_id){
	      $where = array("id"=>$category_id,'type'=>$this->_tag_type);
	      $stt = $this->CI->Tag_Model->delete_data($where);
	      return $stt;
	    }else
	      return false;
	}
	function category_check_have_child($category_id){
		if($category_id){
	    	//$where = array('path_parent'=>$category_id,'type'=>$this->_tag_type);
	    	$where = "FIND_IN_SET($category_id,path_parent) limit 1";
	    	$total = $this->CI->Tag_Model->get_total($where);	
	      	return $total;
	    }
	    return 0;
	}
	function category_check_have_product($category_id){
		if($category_id){
			$select = array('table_join'=>array());
			$select['table_join'] = array();
			$select['table_join'][] = array('table_name'=>'rz_product as B','condition'=>"A.id =B.parent_id", 'type'=>'left');
			$where = array('where'=> array());
			$where['where'] = array('B.parent_id'=>$category_id);
			$limit = array('type'=>'int','limit'=>1);
			$have_product = $this->CI->Tag_Model->get_dt($select,$where,$limit);	
			return $have_product;
		}
		return 0;
	}

	//SUPPORT FUNCTION
	//$data :is array
	/*function format_path_parent($data){
		foreach ($data as $key => $value) {
			$data[$key]['parent_id']=0;
			if($value['path_parent']){
				$path_parent = explode(',', $value['path_parent']);
				$data[$key]['parent_id'] = end($path_parent);
			}
		}
		return $data;
	}*/
}