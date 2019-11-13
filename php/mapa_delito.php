<?php

    include 'config_conexion.php';
    header("Content-type: text/javascript");
    
    $sql_crime="SELECT * FROM crime";
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
                    'title' => $crime->crime_description,
                    'marker-color' => '#f00',
                    'marker-size' => 'small'
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