<?php
    include 'config_conexion.php';
    
    $sql_type_crime="SELECT * FROM type_crime";
	$resultados=$conn->prepare($sql_type_crime);
	$resultados->execute();
	$registros=$resultados->fetchAll(PDO::FETCH_OBJ);
    $resultados->closeCursor();
    

    foreach ($registros as $type_crime) {
        echo '<option value="'.$type_crime->ID.'">'.$type_crime->type_crime_description.'</option>';
    }
    exit();
?>