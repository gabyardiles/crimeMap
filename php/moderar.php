<?php

    include 'config_conexion.php';
    header("Content-type: text/javascript");    

    session_start();
    $username=$_SESSION['root'];
    $zone = (int)$_POST['zone'];
    $type_crime = (int)$_POST['type_crime'];
    $dateSince = $_POST['dateSince'];
    $timeSince = strtotime($dateSince);
    $newformatSince = date('Y-m-d',$timeSince);

    $dateUntil = $_POST['dateUntil'];
    $timeUntil = strtotime($dateUntil);
    $newformatUntil = date('Y-m-d',$timeUntil);

    $offset = $_POST['offset'];

    $parameters = [];

    $sql_crime="SELECT * FROM crime INNER JOIN type_crime on type_crime_id = type_crime.ID  INNER JOIN zones on zone_id = zones.ID WHERE status = 'Disponible'";
    
    if (!empty($zone)) {
        $sql_crime.=" AND zone_id = :zone_id";
        $parameters['zone_id'] = $zone;
    };

    if (!empty($type_crime)) {
        $sql_crime.=" AND type_crime_id = :type_crime_id";
        $parameters['type_crime_id'] = $type_crime;
    }

    if (!empty($dateSince) && !empty($dateUntil)) {
        echo 'entra fecha';
        $sql_crime.=" AND date_crime BETWEEN :date_start AND :date_end";
        $parameters['date_start'] = $newformatSince;
        $parameters['date_end'] = $newformatUntil;
    } else if (!empty($dateSince)){
        $sql_crime.=" AND date_crime >= :date_start";
        $parameters['date_start'] = $newformatSince;
    } else if (!empty($dateUntil)){
        $sql_crime.=" AND date_crime <= :date_end";
        $parameters['date_end'] = $newformatUntil;
    };

    $sql_crime .= ' limit 10 offset '.$offset;
    $resultados=$conn->prepare($sql_crime);
	$resultados->execute($parameters);
    $registros=$resultados->fetchAll(PDO::FETCH_OBJ);
    $resultados->closeCursor();

    foreach ($registros as $crime) {
        $parseDate = date('d/m/Y', strtotime($crime->date_crime));
        echo "<tr><td><div class='custom-control custom-checkbox'><input type='checkbox' name='crimes[]' class='custom-control-input' id=$crime->ID_crime><label class='custom-control-label' for=$crime->ID_crime></label></div></td><td>$crime->ID_crime</td><td>$crime->type_crime_description</td><td>$crime->crime_description</td><td class='d-none d-lg-table-cell'>$parseDate $crime->hour_crime</td><td class='d-none d-lg-table-cell'>$crime->zone_description</td></tr>";
    }
    exit();