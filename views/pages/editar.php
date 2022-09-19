<?php

if (isset($_GET["id"])) {
    $item = "id";
    $valor = $_GET["id"];
    $usuario = RegistroController::ctrSeleccionarRegistros($item, $valor);
}

?>

<div class="d-flex justify-content-center text-center">
    <form class="p-5 bg-light" method="POST">
        <div class="form-group">

            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                </div>
                <input type="text" class="form-control" value="<?php echo $usuario["usuario"]; ?>"
                    placeholder="Escribir nombre" id="nombre" name="actualizarNombre">
            </div>

        </div>
        <div class="form-group">

            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa-regular fa-envelope"></i></span>
                </div>
                <input type="email" class="form-control" value="<?php echo $usuario["email"]; ?>"
                    placeholder="Escribir email" id="email" name="actualizarEmail">
            </div>

        </div>
        <div class="form-group">

            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa-regular fa-key"></i></span>
                </div>
                <input type="password" class="form-control" placeholder="Escribir contraseña" id="pwd"
                    name="actualizarPassword">

                <input type="hidden" name="passwordActual" value="<?php echo $usuario["password"]; ?>">
                <input type="hidden" name="id" value="<?php echo $usuario["id"]; ?>">
            </div>
        </div>

        <?php
$actualizar = RegistroController::ctrActualizarRegistro();
if ($actualizar == "ok") {
    ClearCache::limpiarCache();
    echo '<div class="alert alert-success">El usuario ha sido actualizado.</div>
    <script>
            setTimeout(function(){
                window.location = "index.php?pagina=inicio";

            },3000)
    </script>';
}
?>

        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>