<?php
    require 'conexion.php';
    session_start();
    if(!isset($_SESSION['email'])){
        header("Location: login.php");
    }
    if($_SESSION['rol'] != "admin"){
        header("Location: error.html");
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./styleGeneral.css">
    <title>RenCars</title>
    <style>
        table{
            width: 100%;
        }
        tr{
            height: 40px;
        }
        a{
            display: block;
            text-align: center;
            height: 100%;
            color: black;
        }
        a p{
            position: relative;
            display: block;
            top: 50%;
            transform: translateY(-50%);
        }
        .Cancelado{
            background-color: #ff5f5f;
        }
        .Pendiente{
            background-color: #ffe676;
        }
        .Aceptado{
            background-color: #26e400;
        }
        .hTable{
            background-color: #5e5000a6;
            color: white;
        }
        table{
            border: none;
            border-radius: 10px;
        }
        th{
            border-radius: 8px;
            border: solid black 1px;
        }
    </style>
</head>
<body>
    <header>
        <h1>RenCars</h1>
        <div class="logout"><a href="logout.php"><i class="fa-solid fa-right-from-bracket"> Cerrar sesion         de <?php echo $_SESSION['idUsuario']?></i></a></div>
    </header>
    <div class="container">
        <h2 class="titulo">Bienvenido a tu panel</h2>
        <div class="generar">
            <h2>Notificaciones</h2><br>
            <form action="panel.php" method="get">
                <table border=1>
                    <tr>
                        <th class="hTable">pedido</th>
                        <th class="hTable">usuario</th>
                        <th class="hTable">desde</th>
                        <th class="hTable">hasta</th>
                        <th class="hTable">estado</th>
                        <th class="hTable">cancelar</th>
                        <th class="hTable">aceptar</th>
                    </tr>
                    <?php
                        if(isset($_GET['op'])){
                            if ($_GET['op'] == "Cancelar") {
                                $consulta2=$conexion->prepare("UPDATE `rentas` SET estado='Cancelado' WHERE idRenta='".$_GET['idRenta']."'");
                                $consulta2->execute();
                            }else{
                                $consulta2=$conexion->prepare("UPDATE `rentas` SET estado='Aceptado' WHERE idRenta='".$_GET['idRenta']."'");
                                $consulta2->execute();
                            }
                            echo '<div class="accion">
                                <h3>Se cambio con exito</h3>
                            </div>';
                        }

                        $consulta=$conexion->prepare("SELECT * FROM `rentas`");
                        $consulta->execute();
                        $datos=$consulta->fetchALL(PDO::FETCH_ASSOC);
                        foreach ($datos as $db) {
                            echo "<tr>
                                <th>".$db['auto']."</th>
                                <th>".$db['idUsuario']."</th>
                                <th>".$db['desde']."</th>
                                <th>".$db['hasta']."</th>
                                <th class='".$db['estado']."'> ".$db['estado']."</th>
                                <th><a class='Cancelado' href='panel.php?op=Cancelar&idRenta=".$db['idRenta']."'><p>Cancelar</p></a></th>
                                <th><a class='Aceptado' href='panel.php?op=Aceptar&idRenta=".$db['idRenta']."'><p>Aceptar</p></a></th>
                                </tr>";
                        }
                    ?>
                </table>
            </form>
        </div>
    </div>
</body>
</html>