<?php
/*
  +------------------------------------------------------------------------+
  | Copyright (C) 2016 Toigiaitri.                                         |
  |                                                                        |
  | This program is free software; you can redistribute it and/or          |
  | modify it under the terms of the Toigiaitri  License                   |
  |                                                                        |
  +------------------------------------------------------------------------+
  | o Developer : Rain                                                     |
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

	function validate_edit_area($param){
	    $param = $this->validate_save_area($param);
	    if($param){
	    	$param['id'] 	= isset($param['id']) && $param['id'] ?$param['id']: 0;
	    	if(!$param['id'])
	    		return 0;
	    }
	    return $param;
	}
	function handle_save_area($param){
		//path_parent,level,path_parent_name
		$param['path_parent']=0;
		$param['path_parent_name']=$param['name'];
		$param['level']=0;
		if($param['parent_id']){
			$area = $this->get_area($param['parent_id']);
			if($area['path_parent'] && $area['level']){
				$param['path_parent'] = $area['path_parent'].','.$area['id'];
				$param['path_parent_name'] = $area['path_parent_name'].'/'.$param['name'];
				$param['level'] = $area['level']+1;
			}else{
				$param['path_parent'] = $area['id'];
				$param['path_parent_name'] = $area['name'].'/'.$param['name'];
				$param['level']=1;
			}
		}
		return $param;
	}
	function edit_area($param){ 
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
	    $data['enabled'] 	= $param['status']; 
	    if(isset($param['id']) && $param['id']){
	      $where = array("id"=> $param['id']);
	      $stt = $this->CI->tag_model->update_data($data,$where); 
	      return $stt;
	    }else{
	      return FALSE;
	    }
	}
	function get_area($id){
	    $select="id,name,description,enabled as status,path_parent,level,path_parent_name";
	    $where = array('id'=>$id, 'type'=>$this->_tag_type);
	    $data = $this->CI->tag_model->get_data($select,$where,1);
	    if($data){
	    	return $data[0];
	    }else{
	    	return 0;
	    }
	}
	function get_area_list($level=false){
	    $select="id,parent_id,name,description,enabled as status,path_parent,level,path_parent_name";
	    $where = array('type'=>$this->_tag_type);
	    if($level!==false){
	    	$where['level'] = $level;
	    }
	    $data = $this->CI->tag_model->get_data($select,$where);
	    /*if($data){
	    	$data = $this->format_path_parent($data);
	    }*/
	    return $data;
	}
	function areas_delete($area_id){
	    if($area_id){
	      $where = array("id"=>$area_id,'type'=>$this->_tag_type);
	      $stt = $this->CI->tag_model->delete_data($where);
	      return $stt;
	    }else
	      return false;
	}
	function area_check_have_child($area_id){
		if($area_id){
	    	//$where = array('path_parent'=>$area_id,'type'=>$this->_tag_type);
	    	$where = "FIND_IN_SET($area_id,path_parent) limit 1";
	    	$total = $this->CI->tag_model->get_total($where);	
	      	return $total;
	    }
	    return 0;
	}
	function area_check_have_product($area_id){
		if($area_id){
			$select = array('table_join'=>array());
			$select['table_join'] = array();
			$select['table_join'][] = array('table_name'=>'rz_product as B','condition'=>"A.id =B.parent_id", 'type'=>'left');
			$where = array('where'=> array());
			$where['where'] = array('B.parent_id'=>$area_id);
			$limit = array('type'=>'int','limit'=>1);
			$have_product = $this->CI->tag_model->get_dt($select,$where,$limit);	
			return $have_product;
		}
		return 0;
	}

}