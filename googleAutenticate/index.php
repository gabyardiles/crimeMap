<?php

$ext = substr(strrchr(__FILE__, '.'), 1);

if ( ! defined( 'ROOT_PATH' ) ) {
  define( 'ROOT_PATH', dirname(__FILE__) . '/' );
}

//requerimos la configuracion del host
require ( ROOT_PATH . 'config.php' );

require ( ROOT_PATH . 'model/idiorm.php' );

//requerimos SetUp.php
require ( ROOT_PATH . 'public/SetUp.php' );

//iniciamos vistas del front
if(isset($_GET['view'])) {
   if(file_exists( ROOT_PATH . 'controller/' . strtolower($_GET['view']) .'.'. $ext )) {
     include( ROOT_PATH . 'controller/' . strtolower($_GET['view']) .'.'. $ext );
   } else {
     include( ROOT_PATH.'controller/404.php');
   }
 } else {
   include( ROOT_PATH.'controller/index.php');
 }
 //end front


?>
