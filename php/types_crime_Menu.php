<?php
    include 'config_conexion.php';
    
    $sql_type_crime="SELECT * FROM type_crime";
	$resultados=$conn->prepare($sql_type_crime);
	$resultados->execute();
	$registros=$resultados->fetchAll(PDO::FETCH_OBJ);
    $resultados->closeCursor();
    

    foreach ($registros as $type_crime) {
        echo '<li value="'.$type_crime->ID.'">
        <a href="#">
        <svg height="20" width="20">
        <circle cx="10" cy="10" r="5" stroke="'.$type_crime->color.'" stroke-width="3" fill="'.$type_crime->color.'" />
        </svg>'.$type_crime->type_crime_description.'</a></li>';
    }
    exit();
?>