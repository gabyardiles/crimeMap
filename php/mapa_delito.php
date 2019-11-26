<?php

    include 'config_conexion.php';
    header("Content-type: text/javascript");

    session_start();
    $zone_id = $_POST['zone_filter'];
    $type_crime = $_POST['type_crime'];

    $date_start = $_POST['date_start'];
    $timedate_start = strtotime($date_start);
    $newformatDate_start = date('Y-m-d',$timedate_start);

    $date_end = $_POST['date_end'];
    $timedate_end = strtotime($date_end);
    $newformatDate_end = date('Y-m-d',$timedate_end);

    $parameters = [];

    $sql_crime="SELECT * FROM crime INNER JOIN type_crime on crime.type_crime_id = type_crime.ID WHERE status='Aprobado'";
    
    if (!empty($date_start) && !empty($date_end)) {
        $sql_crime.=" AND date_crime BETWEEN :date_start AND :date_end";
        $parameters['date_start'] = $newformatDate_start;
        $parameters['date_end'] = $newformatDate_end;

    } else if (!empty($date_start)) {
        $sql_crime.=" AND date_crime >= :date_start";
        $parameters['date_start'] = $newformatDate_start;
    } else if (!empty($date_end)){
        $sql_crime.=" AND date_crime <= :date_end";
        $parameters['date_end'] = $newformatDate_end;
    };

    if (!empty($zone_id) && is_null($zone_id) == false) {
        $sql_crime.=" AND zone_id = :zone_id";
        $parameters['zone_id'] = $zone_id;
    };
         
    if (!empty($type_crime) && is_null($type_crime) == false) {
       $sql_crime.=" AND type_crime_id = :type_crime_id";
        $parameters['type_crime_id'] = $type_crime;
    }
        
    $resultados=$conn->prepare($sql_crime);
	$resultados->execute($parameters);
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