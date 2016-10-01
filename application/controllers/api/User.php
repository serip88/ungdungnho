<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH . '/libraries/Base_controller.php';

/**
 * This is an example of a few basic user interaction methods you could use
 * all done with a hardcoded array
 *
 * @package         CodeIgniter
 * @subpackage      Rest Server
 * @category        Controller
 * @author          Phil Sturgeon, Chris Kacerguis
 * @license         MIT
 * @link            https://github.com/chriskacerguis/codeigniter-restserver
 */
class User extends Base_controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->library('user_lib');
        // Configure limits on our controller methods
        // Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
        $this->methods['user_get']['limit'] = 500; // 500 requests per hour per user/key
        $this->methods['user_post']['limit'] = 100; // 100 requests per hour per user/key
        $this->methods['user_delete']['limit'] = 50; // 50 requests per hour per user/key
        
    }

    public function user_get()
    {
        
        /*if (!empty($user))
        {
            $this->set_response($user, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
        }
        else
        {
            $this->set_response([
                'status' => FALSE,
                'message' => 'User could not be found'
            ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }*/
    }
    public function user_list_get()
    {
        $data = $this->user_lib->get_user_list();
        if($data){
            $stt=TRUE;
            $data = $this->user_lib->format_user_list($data);
        }
        else 
            $stt=FALSE;

        $this->set_response([
            'status' => $stt,
            'rows' => $data
        ], REST_Controller::HTTP_OK);
    }
    public function user_detail_get()
    {
        $param = $this->get();
        $user_id = isset($param['user_id']) && $param['user_id'] ? $param['user_id'] : 0;
        $data_user = $this->user_lib->get_user($user_id);
        $data_group = $this->user_lib->get_user_group();
        if($data_user && $data_group)
            $stt=TRUE;
        else 
            $stt=FALSE;

        $this->set_response([
            'status' => $stt,
            'user' => $data_user,
            'user_group' => $data_group,
        ], REST_Controller::HTTP_OK);
    }
    public function user_ss_get()
    {
        $status = false;
        $data_user = $this->user_lib->get_user_session();
        if($data_user){
            $status = true;
        }
        $response = array('status' => $status, 'user_data'=> $data_user);
        $this->custom_response($response);
    }

    public function user_group_get()
    {
        $data = $this->user_lib->get_user_group();
        if($data)
            $stt=TRUE;
        else 
            $stt=FALSE;

        $this->set_response([
            'status' => $stt,
            'rows' => $data
        ], REST_Controller::HTTP_OK);
    }
    public function user_save_post(){
        $param = $this->post();
        $stt=FALSE;
        $msg='';
        $param = $this->user_lib->validate_save_user($param);
        if($param){
            $res = $this->user_lib->save_user($param);
            if(!$res['stt']){
                $msg = $res['msg'];
            }else{
                $msg = 'Add User Success';
                $stt = true;
                $option_key = array('max_in_a_group','max_group','current_store_user','group_full_add_more');
                $option = $this->get_option_key($option_key);
                $response = $this->init_user_category($res['user_id'],$option);
            }
        }
        $response = array('status' => $stt,'msg'=> $msg);
        $this->custom_response($response);
    }
    public function user_edit_post(){
        $stt=FALSE;
        $param = $this->post();
        $param = $this->user_lib->validate_edit_user($param);
        if($param){
            $stt = $this->user_lib->edit_user($param);
            $have_option = $this->check_option_user($param['user_id']);
            //init_user_category
            if($stt && !$have_option){
                $option_key = array('max_in_a_group','max_group','current_store_user','group_full_add_more');
                $option = $this->get_option_key($option_key);
                $response = $this->init_user_category($param['user_id'],$option);
            }
        }else{
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST);// BAD_REQUEST (400) being the HTTP response code
        }
        $this->set_response([
            'status' => $stt
        ], REST_Controller::HTTP_OK);
    }

    /*public function users_post()
    {
        // $this->some_model->update_user( ... );
        $message = [
            'id' => 100, // Automatically generated by the model
            'name' => $this->post('name'),
            'email' => $this->post('email'),
            'message' => 'Added a resource'
        ];

        $this->set_response($message, REST_Controller::HTTP_CREATED); // CREATED (201) being the HTTP response code
    }*/
    public function user_delete_post(){
        $params = $this->post();
        $users_id = isset($params['user_delete']) && $params['user_delete']?$params['user_delete']:array();
        $msg = '';
        $status = false;
        $count_false = 0;
        if(count($users_id)){
            foreach ($users_id as $key => $id) {
                try {
                    $stt = $this->user_lib->user_delete($id);
                    if(!$stt)
                        $count_false = $count_false +1;    
                } catch (Exception $e) {
                    $count_false = $count_false +1;
                    //echo 'Caught exception: ',  $e->getMessage(), "\n";
                }
            }
        } 
        if($count_false == 0){
            $status = true;
            $msg = 'delete success';
        }else{
            $msg = 'delete false';
        }
        $response = array('status' => $status,'msg' => $msg);
        $this->custom_response($response);
    }
    public function users_delete()
    {
        $id = (int) $this->get('id');

        // Validate the id.
        if ($id <= 0)
        {
            // Set the response and exit
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // BAD_REQUEST (400) being the HTTP response code
        }

        // $this->some_model->delete_something($id);
        $message = [
            'id' => $id,
            'message' => 'Deleted the resource'
        ];

        $this->set_response($message, REST_Controller::HTTP_NO_CONTENT); // NO_CONTENT (204) being the HTTP response code
    }
   
}