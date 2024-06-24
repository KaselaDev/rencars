<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleGeneral.css">
    <title>WebGenerator3000</title>
</head>
<body>
    <header>
        <h1>WebGenerator 3000</h1>
    </header>
    <div class="container">
        <h2 class="titulo">Logueate para usar nuestro sistema</h2>
        <div class="login">
            <?php
                require_once 'conexion.php';
                session_start();
                if (isset($_GET['btn'])) {
                    $email = $_GET['email'];
                    $pass = $_GET['pass'];

                    $consulta=$conexion->prepare("SELECT * FROM `users` WHERE email='$email'");
                    $consulta->execute();
                    $datos=$consulta->fetchALL(PDO::FETCH_ASSOC);
                    if (isset($datos[0])){
                        foreach ($datos as $db) {
                            if ($db['password'] === $pass) {
                                $_SESSION['email']=$db['email'];
                                $_SESSION['idUsuario']=$db['idUsuario'];
                                $_SESSION['rol']=$db['rol'];
                                header("Location: solicitar.php");
                            }else{
                                echo "la contraseña es incorrecta";
                            }
                        }
                    }else{
                        echo "El email es incorrecto";
                    }
                }
            ?>
            <h2>Iniciar Session</h12>
            <form action="login.php" method="get">
                <input type="email" name="email" placeholder="Ingresar tu email" required>
                <br>
                <input type="password" name="pass" placeholder="Ingresar tu Clave" required>
                
                <div class="buttons">
                    <div class="register">
                        <a href="register.php"><h4>Registrarse</h4></a>
                    </div>
                    <input type="submit" name="btn" value="Enviar">
                </div>
            </form>
        </div>
    </div>
</body>
</html>