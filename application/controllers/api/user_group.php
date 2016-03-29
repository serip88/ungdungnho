<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH . '/libraries/Base_controller.php';

/**
 * This is an example of a few basic user interaction methods you could use
 * all done with a hardcoded array
 *
 * @package         CodeIgniter
 * @category        Controller
 * @author          Rain
 */
class User_group extends Base_controller {

	function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->library('user_lib');
    }
	
	public function permissions_get(){
		$list_action = $this->get_list_action();
		$response = array('status' => true,'rows' => $list_action);
		$this->custom_response($response);
	}

	public function save_post(){
		$param = $this->post();
		$stt=FALSE;
        $msg='';
        $param = $this->user_lib->validate_save_user_group($param);
        if($param){
            $stt = $this->user_lib->save_user_group($param);
            if(!$stt){
                $msg = 'Error! Cannot create user group.';
            }
        }
        $response = array('status' => $stt,'msg'=> $param);
        $this->custom_response($response);
	}
	public function detail_get(){
		$param = $this->get();
        $group_id = isset($param['id']) && $param['id'] ? $param['id'] : 0;
        $data_group = $this->user_lib->get_user_group_detail($group_id);
        $list_action = $this->get_list_action();
        if($data_group && $list_action){
            $stt=TRUE;
            $data_group['permission']=  json_decode($data_group['permission']);
            $data_group['list_permissions'] = $list_action;
        }
        else 
            $stt=FALSE;
        $response = array('status' => $stt,'msg'=> $param,'data'=>$data_group);
        $this->custom_response($response);
	}
	public function edit_post(){
        /*$param = $this->post();
        $param = $this->user_lib->validate_edit_user($param);
        
        if($param){
            $id = $this->user_lib->edit_user($param);
        }else{
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);// BAD_REQUEST (400) being the HTTP response code
        }
            
        if($id)
            $stt=TRUE;
        else 
            $stt=FALSE;
        $this->set_response([
            'status' => $stt,
            'rows' => $id
        ], REST_Controller::HTTP_OK);*/
    }
}