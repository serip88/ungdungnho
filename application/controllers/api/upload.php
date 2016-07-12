<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH . '/libraries/Base_controller.php';

class Upload extends Base_controller {
    private $dir_path="";
    private $dir_tmp="";
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->dir_path='./app/images';
        $this->dir_tmp= $this->dir_path . '/tmp';
        $this->load->library('upload_lib');
    }

    
    
    public function upload_img_user_post(){
        $msg = '';
        $status = false;
        $answer = array();
        $data_user = $this->get_user_session();
        if( !empty($_FILES) && $data_user && $data_user['username']) {
            try {
                if(!file_exists($this->dir_tmp . '/' . $data_user['username'])) {
                    mkdir($this->dir_tmp . '/' . $data_user['username'], 0777);
                }
                $tempPath = $_FILES[ 'file' ][ 'tmp_name' ];
                $file_name = $this->upload_lib->validate_file_in_path($this->dir_tmp . '/' . $data_user['username'], $_FILES[ 'file' ][ 'name' ]);
                $uploadPath = $this->dir_tmp . '/' . $data_user['username'] . '/' . $file_name;
                move_uploaded_file( $tempPath, $uploadPath );
                $answer = array( 'name'=>$file_name,'path'=>$uploadPath );
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
