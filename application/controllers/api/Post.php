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

defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/Base_controller.php';
class Post extends Base_controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->library('post_lib');
        
    }
    
    public function save_post(){
        $param = $this->post();
        $stt=FALSE;
        $msg='';
        $param = $this->post_lib->validate_save_area($param);
        if($param){
            $param = $this->post_lib->handle_save_area($param);
            $stt = $this->post_lib->save_area($param);
            if(!$stt){
                $msg = 'Error! Cannot save.';
            }
        }
        $response = array('status' => $stt,'msg'=> $msg);
        $this->custom_response($response);
    }
}