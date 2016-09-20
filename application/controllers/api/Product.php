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
    public function edit_post(){
        $upload_image = false;
        $stt=FALSE;
        $msg='';
        $param = $this->post();
        $param = $this->product_lib->validate_edit_product($param);
        if($param){
            $param = $this->product_lib->handle_save_product($param);
            $stt = $this->product_lib->edit_product($param);
            if($stt){
                //B upload file
                if(isset($param['file']) ){
                    $file_exit = $this->product_lib->check_file_exit($param['file']);
                    if($file_exit){
                        $param['new_file'] = $this->move_file_to_product_folder($param['file']['name'],$param['file']['path']);
                        if($param['new_file']){
                            //remove old image if it have
                            if($param['image_path']){
                                $param['image_path'] = strpos($param['image_path'], ".") == 0 ? $param['image_path'] : ".".$param['image_path'];
                                @unlink(FCPATH.$param['image_path']);

                            }
                            $upload_image = true;
                            $dir_path_user_tmp = $this->get_dir_path_user_tmp();
                            $this->remove_all_files_in_folder($dir_path_user_tmp);
                        }
                    }
                }
                //E upload file
                if($upload_image){
                    $param['file_name_mb']= $param['new_file']['name'];
                    $param['file_path_mb']= $param['new_file']['path'];
                    $stt = $this->product_lib->edit_product($param);
                }
            }else{
                $msg = 'Error! Cannot save product.';
            }
        }
        $response = array('status' => $stt,'msg'=> $msg);
        $this->custom_response($response);
    }

    //return file to new location
    public function move_file_to_product_folder($file_name, $file_path){
        $this->load->library('upload_lib');
        $option = $this->handle_get_option_post_folder();
        //Importance check folder before upload
        $this->handle_check_option_folder_is_created($this->dir_path_post,$option);
        $path_image = $this->dir_path_post.'/'.$option['store_value'].'/'.$option['group_value'].'/'.$option['child_value'];
        $file_name = $this->upload_lib->validate_file_in_path($path_image, $file_name);
        //$uploadPath = $path_image . '/' . $file_name;
        $uploadPath = $path_image .'/'.IMAGE_BIG . '/' . $file_name;
        //move file to new location
        $stt = rename( FCPATH.$file_path, FCPATH.$uploadPath );
        if($stt){
            try {
                $phpThumb = new phpThumb();
                $phpThumb->setSourceFilename(FCPATH.$uploadPath);
                $phpThumb->setParameter('w', IMAGE_LARGE_SIZE);
                if($phpThumb->GenerateThumbnail()){
                    if(!$phpThumb->RenderToFile(FCPATH.$path_image .'/'.IMAGE_LARGE . '/' . $file_name)){
                        return false;
                    }
                }else{
                    return false;
                }
                //Importance check full folder before upload
                $this->handle_check_folder_is_over_load($this->dir_path_post,$option);
                return array( 'name'=>$file_name,'path'=>$uploadPath );
            } catch (Exception $e) {
                return false;
            }
        }else{
            return false;
        }
    }
    public function delete_post(){
        $params = $this->post();
        $product_ids = isset($params['product_delete']) && $params['product_delete']?$params['product_delete']:array();
        $msg = '';
        $status = false;
        $count_false = 0;
        if(count($product_ids)){
            foreach ($product_ids as $key => $id) {
                try {
                    $stt = $this->product_lib->product_delete($id);
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
            $msg = "product cannot delete";
        }
        $response = array('status' => $status,'msg' => $msg);
        $this->custom_response($response);
    }
}