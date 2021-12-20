<?php
    REQUIRE ("config/configdb.php");
    //session_start();
    
    if(isset($_POST['submit'])){
        $username = $_POST['nombre'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password2 = $_POST['password_confirm'];

        if (empty($username) ||
            empty($email) ||
            empty($password) ||
            empty($password2)) {
            
            $rellenarCampo = true;

        }
        if ($password !== $password2) {
            $comprobarPass = true;  
        }
        
        $sql = "SELECT * FROM Usuarios WHERE correo = '$email'";  
        $result = mysqli_query($db, $sql);  
        //Si el usuario ya existe será igual a 1
        $count = mysqli_num_rows($result);

        if($count === 1){
            $showError = true;
        }

        $consulta = "INSERT INTO Usuarios(nombre, correo, passw) VALUES ('$username', '$email', '$password')"; 
        $resultado = mysqli_query($db, $consulta);
        if($resultado){
            header('location: index.php');
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
        <title>Registro</title>
    </head>
    <body id="color">
        <main>
            <div class="modal modal-signin position-static d-block py-5" tabindex="-1" role="dialog" id="modalSignin">
                <div class="modal-dialog" role="document">
                    <div class="modal-content rounded-5 shadow">
                        <div class="modal-header p-5 pb-4 border-bottom-0">
                            <!-- <h5 class="modal-title">Modal title</h5> -->
                            <h2 class="fw-bold mb-0">Registro de Usuario</h2>
                        </div>
                        <div class="modal-body p-5 pt-0">
                            <form action="registro.php" method="POST">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control rounded-4" id="floatingPassword" name="nombre">
                                    <label for="floatingPassword">Nombre</label>
                                </div>
                                
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control rounded-4" id="floatingInput" placeholder="name@example.com" name="email">
                                    <label for="floatingInput">Email</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="password" class="form-control rounded-4" id="floatingPassword" placeholder="Password" name="password">
                                    <label for="floatingPassword">Contraseña</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="password" class="form-control rounded-4" id="floatingPassword" placeholder="Password" name="password_confirm">
                                    <label for="floatingPassword">Repita Contraseña</label>
                                </div>
                                <input class="w-100 mb-2 btn btn-lg rounded-4 btn-primary" type="submit" value="Crear Cuenta" name="submit">
                                <small class="text-muted">Al crear una cuenta, aceptas las condiciones y términos de uso.</small>
                                <?php 
                                    if(isset($rellenarCampo)){
                                        echo '<div class="alert alert-danger" role="alert">Todos los campos deben ser rellenados.</div>';
                                    }
                                    if(isset($comprobarPass)){
                                        echo '<div class="alert alert-danger" role="alert">Ambas contraseñas deben coincidir.</div>';
                                    }
                                    if(isset($showError)){
                                        echo '<div class="alert alert-danger" role="alert">El usuario ya está registrado.</div>';

                                    }
                                ?>

                                <hr class="my-4">
                                
                                <h2 class="fs-5 fw-bold mb-3">Preferencias</h2>
                                <input type="checkbox" name="FlashCards" class="checkbox mb-3 mx-sm-1"> FlashCards 
                                <input type="checkbox" name="Trash" class="checkbox mb-3 mx-sm-1"> Trash
                                <input type="checkbox" name="Quimica" class="checkbox mb-3 mx-sm-1"> Química
                                <input type="checkbox" name="Torneo" class="checkbox mb-3 mx-sm-1" > Torneo <br>
                                <input type="checkbox" name="Multiplos" class="checkbox mb-3 mx-sm-1"> Múltiplos
                                <hr class="my-4">
                                <h2 class="fs-5 fw-bold mb-3">O utiliza tu cuenta de Google</h2>
                                
                                <input class="w-100 py-2 mb-2 btn btn-outline-dark rounded-4 bi bi-google" type="submit" value="Crear cuenta con Google">
                                <svg class="position-absolute "xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-google" viewBox="0 0 16 16">
                                    <path d="M15.545 6.558a9.42 9.42 0 0 1 .139 1.626c0 2.434-.87 4.492-2.384 5.885h.002C11.978 15.292 10.158 16 8 16A8 8 0 1 1 8 0a7.689 7.689 0 0 1 5.352 2.082l-2.284 2.284A4.347 4.347 0 0 0 8 3.166c-2.087 0-3.86 1.408-4.492 3.304a4.792 4.792 0 0 0 0 3.063h.003c.635 1.893 2.405 3.301 4.492 3.301 1.078 0 2.004-.276 2.722-.764h-.003a3.702 3.702 0 0 0 1.599-2.431H8v-3.08h7.545z"/>
                                </svg>
                                <p class="mt-5 mb-3 ">¿Ya tienes una cuenta? <a href="index.php">Inicia sesión aquí</a>.</p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </body>
</html>