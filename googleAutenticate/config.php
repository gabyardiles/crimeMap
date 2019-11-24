<?php
/**
* Configuración básica de host.
*/

if (!isset($_SESSION)) {
session_name('demo_sesion_google');
session_start();
}

date_default_timezone_set('America/Argentina/Buenos_Aires');

/** El nombre de tu base de datos */
define( 'DB_NAME', 'base de datos' );

/** Tu nombre de usuario de MySQL */
define( 'DB_USER', 'usuario' );

/** Tu contraseña de MySQL */
define( 'DB_PASS', 'contraseña' );

/** Host de MySQL (es muy probable que no necesites cambiarlo) */
define( 'DB_HOST', 'localhost' );

/** Codificación de caracteres para la base de datos. */
define( 'DB_CHARSET', 'utf8mb4' );
