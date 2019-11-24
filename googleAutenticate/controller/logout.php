<?php

  if(isset($_GET['logout']) == 'desconectar')
  {
    //limpiamos todas las variables de sesion iniciadas
    $_SESSION['demo_sesion_google'] = NULL;

    unset($_SESSION['demo_sesion_google']);

    session_destroy();
    header('Location: ./');
  }
