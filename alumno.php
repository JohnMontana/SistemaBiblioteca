<?php  
    session_start();
    if(isset($_SESSION['user'])){
       if($_SESSION['user']['Tipo']!=2){
            header('Location: login.php');
        }
    }else{
        header('Location: login.php');
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Sistema Biblioteca</title>
    <link type="image/x-icon" href="img/logo2.png" rel="icon" />
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/semantic.min.css">
    <link rel="stylesheet" href="css/index.css">
    <script src="js/popper.min.js"></script>
 
</head>

<body>
    <div class="carga" id="carga">
        <p><img class="carIma" src="img/carga.svg"></p>
        <p><img class="logo" src="img/logo.png"></p>
    </div>
    <?php require "php/menu_a.php"; ?>
    <section class="main">
        <div class="container-fluid">

            
            <div class="row mostrar" id="consul">
                <?php require "vistas/consultas.php";?>
            </div>
            <div class="row mostrar" id='nuevoPresta'>
                <?php require "vistas/nuevoPrestamo.php";?>
            </div>
            <div class="row mostrar" id='editarPrestamo'>
                <?php require "vistas/editarPrestamo.php";?>
            </div>
        </div>
    </section>
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/semantic.min.js"></script>
    <script src="js/loader.js"></script>
    <script src="js/menu.js"></script>
    <script src="js/agregarLibro.js"></script>
    <script src="js/usuarios.js"></script>
    <script src="js/login.js"></script>
    <script src="js/editarLibro.js"></script>
    <script src="js/consultas.js"></script>
    <script src="js/estadisticas.js"></script>
    <script src="js/nuevoPrestamo.js"></script>
    <script src="js/editarPrestamo.js"></script>
</body>

</html>
