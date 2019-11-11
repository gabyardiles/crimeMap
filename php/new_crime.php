<?php
    include 'config_conexion.php';

    if (isset($_POST["submit"])) {
        $address = $_POST['Dirección'];
        $type_crime = $_POST['type_crime'];
        $zone = $_POST['zone'];
        $descriptionCrime = $_POST['descriptionCrime'];

        $hour_crime = $_POST['hour_crime'];
        $date_crime = $_POST['date_crime'];
        
        $sql = "INSERT INTO `crime`(`type_crime_id`, `crime_description`, `date_register`, `latitude`, `longitude`, `date_crime`, `hour_crime`, `zone_id`, `address`) 
        VALUES ('$type_crime','$descriptionCrime',now(),null,null,'$date_crime','$hour_crime','$zone','$address')";

        $datos_introducidos=$conn->prepare($sql);
        $datos_introducidos->execute();
        $datos_introducidos->closeCursor();
        header("../html/new_crime.html");
        $conn=null;

        echo 'Se agrego correctamente el nuevo crimen';
    } else {
        echo 'Falló el envio';
    }
?>

