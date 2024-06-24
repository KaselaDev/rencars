<?php
    require 'conexion.php';
    session_start();
    if(!isset($_SESSION['email'])){
        header("Location: login.php");
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rencars</title>
    <link rel="stylesheet" href="stylesolicitar.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">

</head>
<body>

<div class="flex flex-col min-h-[100dvh]">
  <header class="px-4 lg:px-6 h-14 flex items-center justify-between border-b">
    <a class="flex items-center justify-center" href="#" rel="ugc">
      <svg
        xmlns="http://www.w3.org/2000/svg"
        width="24"
        height="24"
        viewBox="0 0 24 24"
        fill="none"
        stroke="currentColor"
        stroke-width="2"
        stroke-linecap="round"
        stroke-linejoin="round"
        class="h-6 w-6"
      >
        <path d="M19 17h2c.6 0 1-.4 1-1v-3c0-.9-.7-1.7-1.5-1.9C18.7 10.6 16 10 16 10s-1.3-1.4-2.2-2.3c-.5-.4-1.1-.7-1.8-.7H5c-.6 0-1.1.4-1.4.9l-1.4 2.9A3.7 3.7 0 0 0 2 12v4c0 .6.4 1 1 1h2"></path>
        <circle cx="7" cy="17" r="2"></circle>
        <path d="M9 17h6"></path>
        <circle cx="17" cy="17" r="2"></circle>
      </svg>
      <span class=" titulo sr-only">Rencars</span>
    </a>
    <nav class="flex gap-4 sm:gap-6">
      <a class="" href="panel.php">
        Gestionar
      </a>    
      <a href="logout.php" class="">
        Logout
        </a>    
    </nav>
  </header>
  <main class="flex-1">
    <form action="" method="get">
    <section class="w-full py-12 md:py-24 lg:py-32">
      <div class="container px-4 md:px-6 grid gap-8 lg:grid-cols-2 lg:gap-16">
        <div class="space-y-4">
          <h1 class="text-3xl font-bold tracking-tighter sm:text-4xl md:text-5xl">Alquila tu auto con facilidad</h1>
          <br><p class="text-muted-foreground md:text-xl">
            Encuentra el auto perfecto para tus viajes y reserva en línea en minutos.
          </p>
        </div>
        <div class="rounded-lg border bg-card text-card-foreground shadow-sm" data-v0-t="card">
          <div class="flex flex-col p-6 space-y-1">
            <h3 class="whitespace-nowrap font-semibold tracking-tight text-2xl">Solicitar un auto</h3>
            <br><p class="text-sm text-muted-foreground">Completa el formulario para reservar tu auto.</p>
          </div>
          <div class="p-6 grid gap-4">
            <div class="grid grid-cols-2 gap-4">
              <div class="grid gap-2">
                <label
                  class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                  for="car-type"
                >
                  Tipo de auto
                </label>
                
                <select name="auto" require
                ><option value="sedan">Sedán</option>
                <option value="suv">SUV</option>
                <option value="pickup">Pickup</option>
                <option value="van">Van</option></select>
              </div>
              <div class="grid gap-2">
                <label
                  class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                  for="pickup-date"
                >
                  Fecha de recogida
                </label>
                <input
                  name="desde"
                  require
                  type="date"
                />
              </div>
            </div>
            <div class="grid grid-cols-2 gap-4">
              <div class="grid gap-2">
                <label
                  class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                  for="return-date"
                >
                  Fecha de devolución
                </label>
                <input
                  name="hasta"
                  require
                  type="date"
                />
              </div>
              <div class="flex items-end">
              <input class="solicitar" name="enviar" type="submit" value="Solicitar">
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    </form>
    <?php
        if (isset($_GET['enviar'])) {
            $auto=$_GET['auto'];
            $desde=$_GET['desde'];
            $hasta=$_GET['hasta'];
            
            $consulta=$conexion->prepare("INSERT INTO `rentas`(`idRenta`, `idUsuario`, `auto`, `desde`, `hasta`, `estado`) VALUES (NULL, '".$_SESSION['email']."', '$auto', '$desde', '$hasta', 'Pendiente' )");
            $consulta->execute();
            echo "se solicito con exito ☺";
        }
    ?>
  </main>
</div>
</body>
</html>