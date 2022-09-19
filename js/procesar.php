<?php
require_once "../models/conexion.php";
require_once "../controllers/registro_controller.php";
require_once "../models/registro_models.php";


function getUsers()
{
    $usuarios = RegistroController::ctrVisualizarUsuarios($_POST["search"]);
    echo ($usuarios);
}

function postSave()
{
    echo ("respuesta:" . $_POST["name"]);
    $respuesta = RegistroController::ctrRegistrarUser($_POST["name"], $_POST["descripcion"], $_POST["password"]);
    echo ($respuesta);
}

if ($_POST) {
    switch ($_POST["tarea"]) {
        case "search":
            getUsers();
            break;
        case "save":
            postSave();
            break;
    }
}
