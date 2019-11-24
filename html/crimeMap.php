<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Estilos -->
        <link rel="stylesheet" type="text/css" href="../styles/styles.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <!-- Scripts -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="../script/map.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <!--maps script-->
        <script src='https://api.mapbox.com/mapbox-gl-js/v1.4.1/mapbox-gl.js'></script>
        <link href='https://api.mapbox.com/mapbox-gl-js/v1.4.1/mapbox-gl.css' rel='stylesheet' />
        <link href='https://api.mapbox.com/mapbox-assembly/v0.24.0/assembly.min.css' rel='stylesheet'>
        <script async defer src="https://api.mapbox.com/mapbox-assembly/v0.24.0/assembly.js"></script>

        <!-- font awesome -->
        <script src='https://kit.fontawesome.com/a076d05399.js'></script>        
        <!-- title -->
         <title>Mapa del delito</title>
    </head>
    <body>
    <div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Login</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mx-3">
                <div class="md-form mb-5">
                <label data-error="wrong" data-success="right" for="defaultForm-email"><i class="fas fa-envelope prefix grey-text"></i> Email</label>
                <input id="email_login" type="email" id="defaultForm-email" class="form-control validate" required pattern="/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/">
                </div>

                <div class="md-form mb-4">
                <label data-error="wrong" data-success="right" for="defaultForm-pass"><i class="fas fa-lock prefix grey-text"></i> Password</label>
                <input id="password_login" type="password" id="defaultForm-pass" class="form-control validate" required pattern="\w{8}" placeholder="********">
                </div>

            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button id="submint_login" class="btn btn-default">Login</button>
            </div>
            </div>
        </div>
        </div>
        <div class="wrapper">
            <!-- Sidebar -->
            <nav id="sidebar">
                <?php
                    $name = $_GET['name'];
                    $email = $_GET['email'];
                    if ($name != "" && $email != "") {
                        echo "<div class='sidebar-header'>
                        <h2>$name</h2>
                        <p class='title'>$email</p>
                        <div class='sidebar-header'>
                        <a id='modalLogOutForm' href='' class='btn btn-default btn-rounded mb-4'>LogOut</a></div>
                        </div>";
                    } else {
                        echo "<div class='sidebar-header'>
                        <a id='modalLoginForm' href='' class='btn btn-default btn-rounded mb-4' data-toggle='modal' data-target='#modalLoginForm'>Login</a></div>";
                    }
                    ?>
                <ul class="list-unstyled components">
                    <li class="active">
                        <a href="#busqueda_Submenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-search"></i> Búsqueda</a>
                        <ul class="collapse list-unstyled" id="busqueda_Submenu">
                            <li>
                                <a id="type_crime_toggle" href="#Tipos_delito_Submenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-exclamation-triangle"></i> Tipo de delito</a>
                                <ul class="collapse list-unstyled" id="Tipos_delito_Submenu">
                                </ul>
                            </li>
                            <li>
                                <a href="#Date" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="far fa-calendar-alt"></i> Fecha</a>
                                <ul class="collapse list-unstyled" id="Date">
                                    <li>
                                        <input id="dateFilter" type="date" required pattern="\d{1,2}/\d{1,2}/\d{4}" name="dateFilter">
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a id="located_toggle" href="#located" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-map-marked"></i> Ubicación</a>
                                <ul class="collapse list-unstyled" id="located">
                                    <select name="located" id="located_select" class="browser-default custom-select">
                                            <option value='0'>Seleccionar zona</option>
                                    </select>
                                </ul>
                            </li>
                        </ul>
                     <li>
                        <a href="./utils_munber.html"><i class="fas fa-mobile-alt"></i> Números útiles</a>
                    </li>
                    <li>
                        <a href="./contact.html"><i class="far fa-address-book"></i> Contacto</a>
                    </li>
                    <li>
                        <a href="../html/about_us.html"><i class="far fa-question-circle"></i> Acerca de</a>
                    </li>
                </ul>
                <br>
                <br>
                <a id="button_filter" href="../html/search.html"><i class="fas fa-search"></i> Filtrar contenido</a>
            </nav>
            <div id="content">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <div class="container-fluid">
    
                        <button type="button" id="sidebarCollapse" class="navbar-btn">
                            <i class='fas fa-bars' style='font-size:36px'></i>
                        </button>
                        <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <i class="fas fa-align-justify"></i>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="nav navbar-nav ml-auto">
                                <li class="nav-item active">
                                    <a class="nav-link" href="../html/new_crime.html">Nuevo delito</a>
                                </li>
                                <?php
                                $name = $_GET['name'];
                                $email = $_GET['email'];
                                $type_user = $_GET['id'];
                                if ($name != "" && $email != "" && $type_user == 2) {
                                    echo "<li class='nav-item'>
                                    <a class='nav-link' href='../html/moderar.html'>Moderar</a>
                                </li>";
                                }
                                ?>
                                <!-- <li class="nav-item">
                                    <a class="nav-link" href="../html/profile.php">Perfil</a>
                                </li> -->
                            </ul>
                        </div>
                    </div>
                </nav>
                <!-- Contenedor mapa -->
                <div id='map' class="col-lg-12 col-md-6- col-sm-3">
                <pre id='coordinates' class='coordinates'></pre>
                </div>
            </div>
            <!-- Contenedor footer -->
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