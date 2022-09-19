<?php

require_once "controllers/plantilla_controller.php";
require_once "controllers/registro_controller.php";
require_once "controllers/clear_cache.php";
require_once "models/registro_models.php";



$plantilla = new PlantillaController();
$plantilla->ctrTraerPlantilla();

