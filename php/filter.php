<?php

    include 'config_conexion.php';
    header("Content-type: text/javascript");

    session_start();
    $username=$_SESSION['root'];
    $zone_id = $_POST['zone'];
    $date = $_POST['date_crime'];
    $type_crime = $_POST['type_crime'];


    // echo $parseZone;
    // echo $date;
    // echo $type_crime;

    // $queryFilter = "AND";

    if ($date != "") {
        // $queryFilter = $queryFilter + 'date_crime=' + $date;
    };

    if ($zone_id != "") {
        // $queryFilter = $queryFilter + 'zone_id=' + $parseZone;
    };

    if ($type_crime != "") {
        // $queryFilter = $queryFilter + 'type_crime_id=' + $type_crime;
    }

    $sql_crime="SELECT * FROM crime INNER JOIN type_crime on crime.type_crime_id = type_crime.ID WHERE status='Aprobado' AND zone_id = $zone_id";
    // echo $sql_crime;
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
    header('Location: ../html/crimeMap.php?list='.$geojson);

    // echo json_encode($geojson);
    exit();
?>