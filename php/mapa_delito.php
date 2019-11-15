<?php

    include 'config_conexion.php';
    header("Content-type: text/javascript");
    
    $sql_crime="SELECT * FROM crime INNER JOIN type_crime on crime.type_crime_id = type_crime.ID WHERE status='Aprobado'";
	$resultados=$conn->prepare($sql_crime);
	$resultados->execute();
	$registros=$resultados->fetchAll(PDO::FETCH_OBJ);
    $resultados->closeCursor();
    
    $geojson = array( 'type' => 'FeatureCollection', 'features' => array());

    foreach ($registros as $crime) {
        $marker = array(
            'type' => 'Feature',
            'features' => array(
                'type' => 'Feature',
                'properties' => array(
                    'title' => $crime->type_crime_description,
                    'marker-color' => '#f00',
                    'marker-size' => 'small',
                    'icon' => 'police'
                ),
                "geometry" => array(
                    'type' => 'Point',
                    'coordinates' => array($crime->longitude,$crime->latitude)
                )
            )
        );
    array_push($geojson['features'], $marker['features']);
    }
    echo json_encode($geojson);

    exit();
?>