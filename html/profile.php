<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Estilos -->
        <link rel="stylesheet" type="text/css" href="../styles/profileStyle.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <!-- Scripts -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <!-- font awesome -->
        <script src='https://kit.fontawesome.com/a076d05399.js'></script>
        <!-- title -->
        <title>Contactanos</title>
    </head>
    <body>
        <div id="header_Default"class="card-header">
            <a href="../html/crimeMap.php">
                <img src="../images/iconoMapa.png" class="rounded" alt="icon_logo">
                Mapa del crimen
            </a>
        </div>
        <br>
        <br>
        <div class="card">
            <div class="content_image_avatar">
                <img src="../images/avatar.png" alt="Avatar" class="avatar">
            </div>
            <?php
                 $name = $_GET['name'];
                 $email = $_GET['email'];
                 if ($name != "" && $email != "") {
                    echo "<h2>$name</h2>
                    <p class='title'>$email</p>";
                 } else {
                    echo "<h2>Nombre usuario</h2>
                    <p class='title'>ejemplo@ejemplo.com</p>";
                 }
                 
            ?>
            <!-- <h2>Nombre usuario</h2>
            <p class="title">ejemplo@ejemplo.com</p> -->
            <div class="material-input input"><input type="text" class="form-control" placeholder="<?php echo htmlspecialchars($person->name)?>" disabled><span class="material-bar"></span></div>
            <div id="content_redes">
                <a id="image" href="https://www.instagram.com"><i class="fab fa-instagram"></i></a>
                <a id="image" href="https://www.facebook.com"></i><i class="fab fa-facebook"></i></a>
                <a id="image"href="https://twitter.com/login?lang=es"><i class="fab fa-twitter"></i></a>
            </div>
        </div>
    <!-- Contenedor footer -->
    <div class="wrapper">
            <div id="footer" class="footer" class="col-lg-12 col-md-6- col-sm-3">
                <br>
                    <div id="rowStyle" class="row">
                            <div class="col-md-3">
                                <h5 class="text-uppercase">Mapa del crimen</h5>
                            </div>
                            <div class="col-md-3">
                                <a href="https://www.instagram.com"><i class="fab fa-instagram"></i> Instagram</a>
                            </div>
                            <div class="col-md-3">
                                <a href="https://www.facebook.com"></i><i class="fab fa-facebook"></i> facebook</a>
                            </div>
                            <div class="col-md-3">
                                <a href="https://twitter.com/login?lang=es"><i class="fab fa-twitter"></i> Twitter</a>
                            </div>
                            <br>
                    </div>
                <br> 
        </div>
    </div>
    </body>
</html>