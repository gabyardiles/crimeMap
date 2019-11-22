<?php

    include 'config_conexion.php';
    header("Content-type: text/javascript");    

    session_start();
    $username=$_SESSION['root'];
    $zone = $_POST['zone'];
    $type_crime_id = $_POST['type_crime'];
    $dateSince = $_POST['dateSince'];
    $dateUntil = $_POST['dateUntil'];
    $parameters = [];

    $sql_crime="SELECT * FROM crime INNER JOIN type_crime on crime.type_crime_id = type_crime.ID  INNER JOIN zones on crime.zone_id = zones.ID WHERE crime.status = 'Disponible'";
    
    if (!empty($zone)) {
        $sql_crime.=" AND zone_id = :zone_id";
        $parameters['zone_id'] = $zone_id;
    };

    if (!empty($type_crime)) {
        $sql_crime.=" AND type_crime_id = :type_crime_id";
        $parameters['type_crime_id'] = $type_crime_id;
    }


    $resultados=$conn->prepare($sql_crime);
	$resultados->execute($parameters);
	$registros=$resultados->fetchAll(PDO::FETCH_OBJ);
    $resultados->closeCursor();

    $json = array('type' => 'json', 'result' => array());

    foreach ($registros as $crime) {
        // $marker= array(
        //     'ID' => $crime->ID,
        //     'crimen_Tipo_de_crimen' => $crime->type_crime_description,
        //     'Descripcion' => $crime->crime_description,
        //     'Fecha_delito' => $crime->date_crime,
        //     'Hora_delito'=> $crime->hour_crime,
        //     'Zona' => $crime->zone_description
        // );
        // array_push($json,$marker['result']);
        // echo json_encode($json);
        echo "<tr><td><div class='custom-control custom-checkbox'><input type='checkbox' name='crimes[]' class='custom-control-input' id=$crime->ID_crime><label class='custom-control-label' for=$crime->ID_crime></label></div></td><td>$crime->ID_crime</td><td>$crime->type_crime_description</td><td>$crime->crime_description</td><td class='d-none d-lg-table-cell'>$crime->date_crime $crime->hour_crime</td><td class='d-none d-lg-table-cell'>$crime->zone_description</td></tr>";
    }
    exit();