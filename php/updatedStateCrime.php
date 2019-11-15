<?php
    include 'config_conexion.php';

    session_start();
    $username=$_SESSION['root'];
    $ids = $_POST['ids'];
    $json = array( 'type' => 'message', 'messages' => array());
    
    $sql_updated_state="UPDATE crime SET status = 'Aprobado' WHERE ID_crime IN ($ids)";
	$resultados=$conn->prepare($sql_updated_state);
    $resultados->execute();
    // $registros=$resultados->fetchAll(PDO::FETCH_OBJ);
    $resultados->closeCursor();

    if($resultados->errorCode() == 0) {
        echo 'Se actualizó correctamente el estado de los crimenes seleccionado';
    } else {
        echo 'Ocurrió un error al actualizar, por favor reintente';
    };
?>