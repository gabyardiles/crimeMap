<?php
    include 'config_conexion.php';
    
    $sql_zones="SELECT * FROM zones ORDER BY zone_description ASC";
	$resultados=$conn->prepare($sql_zones);
    $resultados->execute();
	$registros=$resultados->fetchAll(PDO::FETCH_OBJ);
    $resultados->closeCursor();
    
    foreach ($registros as $zone) {
        echo '<option value="'.$zone->ID.'">'.$zone->zone_description.'</option>';
    }
    exit();
?>