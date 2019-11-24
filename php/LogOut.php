<?php 

include "config_conexion.php";

session_start();
if (session_destroy()) {
    echo 'Close session';
};


?>