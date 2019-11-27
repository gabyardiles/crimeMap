<?php
include 'config_conexion.php';

session_start();

$nombre = $_POST['nombre'];
$email = $_POST['email'];
$mensaje = $_POST['descripcion'];
$para = 'ardilesgraciela@gmail.com';
$titulo = 'CONSULTA';
$header = 'From: ' . $email;
$msjCorreo = "Nombre: $nombre\n E-Mail: $email\n Mensaje:\n $mensaje";

$sql = "INSERT INTO contact(`complete_name`, `email_contact`, `description_contact`)
    VALUES ('$nombre','$email','$mensaje')";
    
$datos_introducidos=$conn->prepare($sql);
$datos_introducidos->execute();
$datos_introducidos->closeCursor();
$conn=null;


// if (isset($_POST["submit"])) {
    
if (mail($para, $titulo, $msjCorreo, $header)) {
    echo "<script language='javascript'>
                    alert('Mensaje enviado, muchas gracias.');
                    window.location= '../php/crimeMap.php'
        </script>";
    } else {
    echo "<script language='javascript'>
    alert('Falló el envio por favor reintente');
    window.location= '../php/crimeMap.php'
</script>";
    }
// }
?>
