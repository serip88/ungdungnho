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
class Common_lib {
    function token($length = 32) {
    // Create token to login with
    $string = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    
    $token = '';
    
    for ($i = 0; $i < $length; $i++) {
      $token .= $string[mt_rand(0, strlen($string) - 1)];
    } 
    
    return $token;
  }
  function generateRandomString($length = 9) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
  }
  function rz_debug() {
      $trace = debug_backtrace();
      $rootPath = dirname(dirname(__FILE__));
      $file = str_replace($rootPath, '', $trace[0]['file']);
      $line = $trace[0]['line'];
      $var = $trace[0]['args'][0];
      $lineInfo = sprintf('<div><strong>%s</strong> (line <strong>%s</strong>)</div>', $file, $line);
      $debugInfo = sprintf('<pre>%s</pre>', print_r($var, true));
      print_r($lineInfo.$debugInfo);
  }
}