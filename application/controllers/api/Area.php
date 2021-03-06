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
class Area extends Base_controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->library('area_lib');
        // Configure limits on our controller methods
        // Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
        $this->methods['user_get']['limit'] = 500; // 500 requests per hour per user/key
        $this->methods['user_post']['limit'] = 100; // 100 requests per hour per user/key
        $this->methods['user_delete']['limit'] = 50; // 50 requests per hour per user/key
        
    }
    public function save_post(){
        $param = $this->post();
        $stt=FALSE;
        $msg='';
        $param = $this->area_lib->validate_save_area($param);
        if($param){
        	$param = $this->area_lib->handle_save_area($param);
            $stt = $this->area_lib->save_area($param);
            if(!$stt){
                $msg = 'Error! Cannot save.';
            }
        }
        $response = array('status' => $stt,'msg'=> $msg);
        $this->custom_response($response);
    }

    public function edit_post(){
        $param = $this->post();
        $stt=FALSE;
        $msg='';
        $param = $this->area_lib->validate_edit_area($param);
        if($param){
        	$param = $this->area_lib->handle_save_area($param);
            $stt = $this->area_lib->edit_area($param);
            if(!$stt){
                $msg = 'Error! Cannot save category.';
            }
        }
        $response = array('status' => $stt,'msg'=> $msg);
        $this->custom_response($response);
    }

    public function list_get(){
    	$data = $this->area_lib->get_area_list(0);
        if($data)
            $stt=TRUE;
        else 
            $stt=FALSE;

        $this->set_response([
            'status' => $stt,
            'rows' => $data
        ], REST_Controller::HTTP_OK);
    }
    public function district_list_get(){
        $data = $this->area_lib->get_area_list(1);
        if($data)
            $stt=TRUE;
        else 
            $stt=FALSE;

        $this->set_response([
            'status' => $stt,
            'rows' => $data
        ], REST_Controller::HTTP_OK);
    }
    public function delete_post(){
        $params = $this->post();
        $category_ids = isset($params['category_delete']) && $params['category_delete']?$params['category_delete']:array();
        $msg = '';
        $status = false;
        $count_false = 0;
        if(count($category_ids)){
            foreach ($category_ids as $key => $id) {
                try {
                    //check have sub category
                    $total_sub = $this->area_lib->area_check_have_child($id);
                    if($total_sub)
                       $msg = 'You have delete sub item first'; 
                    //check have products
                    $have_product = $this->area_lib->area_check_have_product($id);
                    if($have_product)
                        $msg = 'This item not empty, you have move all product in it'; 
                    if(!$total_sub && !$have_product){
                        $stt = $this->area_lib->areas_delete($id);
                        if(!$stt)
                            $count_false = $count_false +1;    
                    }else{
                        $count_false = $count_false +1;
                    }
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
            $msg = $msg? $msg.'<br/> $count_false item cannot delete': "$count_false item cannot delete";
        }
        $response = array('status' => $status,'msg' => $msg);
        $this->custom_response($response);
    }
}