<?php
  ini_set('display_errors', 1);
  error_reporting(~0);
  REQUIRE ("config/configdb.php");


  session_start();
  if(isset($_POST['inicio'])){
      
    $username = $_POST['email'];
    $password = $_POST['password'];
      
      $sql = "SELECT * FROM Usuarios WHERE correo = '$username' and passw = '$password'";  
      $result = mysqli_query($db, $sql);  
      $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
      $count = mysqli_num_rows($result); 
      
      $count = mysqli_num_rows($result);
      
      //Si es correcto, el valor devuelto debe ser 1
		
      if($count == 1){  
        $_SESSION['inicioUsuario'] = $username;
        header('Location: welcome.php');
      }  
    else{  
      echo "<h5> Error en el inicio de sesión. Contraseña o correo inválidos.</h5>";  
    }     
  }
?>
<!DOCTYPE html>
<html lang=es>
  <head>
      <meta charset=UTF-8>
      <meta http-equiv=X-UA-Compatible content=IE=edge>
      <meta name=viewport content=width=device-width,initial-scale=1.0>
      <link rel=stylesheet href=css/style1.css>
      <link rel=stylesheet href=css/style.css>
      <title>Inicio de Sesión</title>
  </head>
  <body class="text-center" id="color1">
    <main class="form-signin">
      <div class="modal modal-signin position-static d-block bg-secondary py-5" tabindex="-1" role="dialog" id="modalSignin">
        <div class="modal-dialog" role="document">
          <div class="modal-content rounded-5 shadow">
            <div class="modal-header pb-4 border-bottom-0">
              <form action="index.php" method="POST">
                <img class="mb-4" src="inicio.png" alt="" width="72" height="57">
                <h1 class="h3 mb-3 fw-normal">Inicio de Sesión</h1>
            
                <div class="form-floating">
                  <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email">
                  <label for="floatingInput">Email</label>
                </div>
                <div class="form-floating">
                  <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
                  <label for="floatingPassword">Contraseña</label>
                </div>
            
                <div class="checkbox mb-3">
                  <label>
                    <input type="checkbox" value="remember-me"> Recuérdame
                  </label>
                </div>
                <input type="submit" class="w-100 btn btn-lg btn-primary" value="Iniciar Sesión" name="inicio">
                <p class="mt-5 mb-3 ">¿Todavía no tienes una cuenta? <a href="registro.html">Regístrate aquí</a>.</p>
                <p class="mt-5 mb-3 text-muted">&copy DWES 2021</p>
              </form>
            </div>
          </div>
        </div>
      </div>
    </main>
  </body>
</html>