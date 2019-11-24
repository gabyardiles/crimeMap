
  <div class="main-content">
    <div class="container">
      <div class="row">
        <div class="col-md-12">

          <div class="text-center mb-4">
            <h1 class="h3 mb-3 font-weight-normal">Iniciar Sesión</h1>
            <p></p>
          </div>

          <div class="cp-login-box">

            <div class="user-pic"><img src="<?php echo $person->photo; ?>" alt=""></div>
              <div class="cp-login-form">
                <form class="material">
                <ul>
                  <li class="input-group"> <span class="input-group-addon"><i class="fa fa-user"></i></span>
                  <div class="material-input input"><input type="text" class="form-control" placeholder="<?php echo htmlspecialchars($person->name)?>" disabled><span class="material-bar"></span></div>
                  </li>
                  <li>
                  <a href="?view=logout&logout=desconectar"class="btn btn-submit waves-effect waves-button">Cerrar sesión</a>
                  </li>
                </ul>
                </form>
                <div class="signup">
                <!-- <span>Su registro fue :</span><br> -->
                </div>
            </div>

          </div>

        </div>
      </div>
    </div>
  </div>
