<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH . '/libraries/Base_controller.php';

class Upload extends Base_controller {
    private $dir_path="";
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->dir_path='./app/images/';
        //$this->load->library('upload_lib');
    }

    
    
    public function upload_img_user_post(){
        $msg = '';
        $status = false;
        $answer = array();
        if( !empty( $_FILES ) ) {
            try {
                $tempPath = $_FILES[ 'file' ][ 'tmp_name' ];
                $uploadPath = $this->dir_path . $_FILES[ 'file' ][ 'name' ];
                move_uploaded_file( $tempPath, $uploadPath );
                $answer = array( 'name'=>$_FILES[ 'file' ][ 'name' ],'path'=>$uploadPath );
                //$json = json_encode( $answer );
                $msg = 'File transfer completed';
                $status = true;
            } catch (Exception $e) {
                echo 'Caught exception: ',  $e->getMessage();
            }
        }
        $response = array_merge(array('status' => $status,'msg' => $msg),$answer) ;
        $this->custom_response($response);
    }
    
}
