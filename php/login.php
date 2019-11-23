<?php 
 include "config_conexion.php";  

 session_start();
 $username=$_SESSION['login_user'];
 
 $email = $_POST["email"];
 $password = $_POST["password"];
 $parameters = [];

 $sql = "SELECT * FROM user";
 
if ($_SERVER['REQUEST_METHOD'] == 'POST') { 

 if (!empty($email))
 { 
   $sql.=" WHERE email = :email";
   $parameters['email'] = $email;
 } else {
   echo "Email incorrecto";

 }

 if (!empty($password))
 { 
   $sql.=" AND password = :password";
   $parameters['password'] = $password;
 } else {
   echo "Password incorrecta";
 }
 
 $resultados=$conn->prepare($sql);
 $resultados->execute($parameters);
 $registros=$resultados->fetchAll(PDO::FETCH_OBJ);
 $resultados->closeCursor();


echo json_encode($registros);
}
?>