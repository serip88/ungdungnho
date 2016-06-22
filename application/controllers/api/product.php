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
 * @product         Controller
 * @author          Phil Sturgeon, Chris Kacerguis
 * @license         MIT
 * @link            https://github.com/chriskacerguis/codeigniter-restserver
 */
class Product extends Base_controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->library('product_lib');
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
        $param = $this->product_lib->validate_save_product($param);
        if($param){
            $param = $this->product_lib->handle_save_product($param);
            $stt = $this->product_lib->save_product($param);
            if(!$stt){
                $msg = 'Error! Cannot save product.';
            }
        }
        $response = array('status' => $stt,'msg'=> $msg);
        $this->custom_response($response);
    }
    public function product_list_get(){
        $data = $this->product_lib->get_product_list();
        if($data)
            $stt=TRUE;
        else 
            $stt=FALSE;

        $this->set_response([
            'status' => $stt,
            'rows' => $data
        ], REST_Controller::HTTP_OK);
    }

}