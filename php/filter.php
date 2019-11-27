<?php

    include 'config_conexion.php';
    header("Content-type: text/javascript");

    $zone_id = $_POST['zone'];

    $date_start = $_POST['date_crime_start'];
    $timedate_start = strtotime($date_start);
    $newformatDate_start = date('Y-m-d',$timedate_start);

    $date_end = $_POST['date_crime_end'];
    $timedate_end = strtotime($date_end);
    $newformatDate_end = date('Y-m-d',$timedate_end);

    $type_crime = $_POST['type_crime'];
    $parameters = [];

    
    $redirectUrl = '../php/crimeMap.php?';
    if (!empty($zone_id)) {
        $redirectUrl .= 'zone='.$zone_id;
    };

    if (!empty($type_crime)) {
        $redirectUrl .= '&type_crime='.$type_crime;
    }

    if (!empty($date_start) && !empty($date_end)) {
        $redirectUrl .= '&date_start='.$newformatDate_start.'&date_end=' .$newformatDate_end;
    } else if (!empty($date_start)) {
        $redirectUrl .= '&date_start='.$newformatDate_start;
    } else if (!empty($date_end)){
        $redirectUrl .= '&date_end='.$newformatDate_end;
    };
    
    header('Location:' .$redirectUrl);
    exit();
?>