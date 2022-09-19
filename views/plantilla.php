<?php
//variables de session
session_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <!--james-->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SandBox</title>

    <link rel="stylesheet" href="./bootstrap/css/main.css">

    <!--PLUGINS CSS-->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"> -->
    <!-- <link rel="stylesheet" href="https://bootswatch.com/4/cerulean/bootstrap.min.css">-->
    <link rel="stylesheet" href="bootstrap/css/cerulean.min.css">


    <!-- LAST VERSION AWESOME-->
    <script src="https://kit.fontawesome.com/de26c08258.js" crossorigin="anonymous"></script>

    <!--jquery-->
    <script src="./jquery/jquery-3.5.1.min.js"></script>
    <script tyspe="text/javascript" src="js/app.js"></script>

    <!-- sweet alert mensajes de confirmacion-->
    <!-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>-->
    <script src="./js/sweetalert211.js"></script>


    <!-- Estilos para pintar el datable-->
    <script src="./datatables/DataTables/DataTables-1.12.1/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="./datatables/DataTables/DataTables-1.12.1/css/jquery.dataTables.min.css">





    <!-- color para los titulos de la tabla AJAX-->
    <!--    <style>
        table.dataTable thead {
            background: linear-gradient(to right, #0575E6, #00F260);
            color: red;
        }
    </style> -->

</head>

<body>
    <header>
        <div class="jumbotron text-center">
            <h1>My First Bootstrap Page</h1>
            <p>Resize this responsive page to see the effect!</p>
        </div>
    </header>
    <div class="container-fluid bg-light">

        <div class="container">

            <ul class="nav nav-justified py-2 nav-pills">

                <?php if (isset($_GET["pagina"])) : ?>

                    <?php if ($_GET["pagina"] == "registro") : ?>
                        <li class="nav-item">
                            <a class="nav-link active" href="index.php?pagina=registro">Registro</a>
                        </li>
                    <?php else : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?pagina=registro">Registro</a>
                        </li>
                    <?php endif ?>

                    <?php if ($_GET["pagina"] == "ingreso") : ?>
                        <li class="nav-item">
                            <a class="nav-link active" href="index.php?pagina=ingreso">Ingreso</a>
                        </li>
                    <?php else : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?pagina=ingreso">Ingreso</a>
                        </li>
                    <?php endif ?>

                    <?php if ($_GET["pagina"] == "inicio") : ?>
                        <li class="nav-item">
                            <a class="nav-link active " href="index.php?pagina=inicio">Inicio</a>
                        </li>
                    <?php else : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?pagina=inicio">Inicio</a>
                        </li>
                    <?php endif ?>

                    <?php if ($_GET["pagina"] == "ajax") : ?>
                        <li class="nav-item">
                            <a class="nav-link active" href="index.php?pagina=ajax">Ajax</a>
                        </li>
                    <?php else : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?pagina=ajax">Ajax</a>
                        </li>
                    <?php endif ?>

                    <?php if ($_GET["pagina"] == "salir") : ?>
                        <li class="nav-item">
                            <a class="nav-link active" href="index.php?pagina=salir">Salir</a>
                        </li>
                    <?php else : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?pagina=salir">Salir</a>
                        </li>
                    <?php endif ?>



                <?php else : ?>

                    <li class="nav-item">
                        <a class="nav-link active" href="index.php?pagina=registro">Registro</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="index.php?pagina=ingreso">Ingreso</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="index.php?pagina=inicio">Inicio</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="index.php?pagina=ajax">Ajax</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="index.php?pagina=salir">Salir</a>
                    </li>
                <?php endif ?>

            </ul>
        </div>
    </div>

    <div class="container-fluid">
        <div class="container py-5">
            <?php
            if (isset($_GET["pagina"])) {
                if (
                    $_GET["pagina"] == "registro" ||
                    $_GET["pagina"] == "ingreso" ||
                    $_GET["pagina"] == "inicio" ||
                    $_GET["pagina"] == "editar" ||
                    $_GET["pagina"] == "ajax" ||
                    $_GET["pagina"] == "salir"
                ) {

                    include "views/pages/" . $_GET["pagina"] . ".php";
                } else {
                    include "views/pages/error404.php";
                }
            } else {
                include "views/pages/registro.php";
            }

            ?>
        </div>
    </div>



</body>

</html>