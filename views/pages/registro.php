<div class="d-flex justify-content-center text-center">

    <form class="p-5 bg-light" method="POST">
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                </div>
                <input type="text" class="form-control" placeholder="Ingrese Nombre" id="nombre" name="registroNombre">
            </div>

        </div>
        <div class="form-group">
            <label for="email">Correo electrónico:</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa-regular fa-envelope"></i></span>
                </div>
                <input type="email" class="form-control" placeholder="Ingrese email" id="email" name="registroEmail">
            </div>

        </div>
        <div class="form-group">
            <label for="pwd">Contraseña:</label>

            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa-regular fa-key"></i></span>
                </div>
                <input type="password" class="form-control" placeholder="Ingrese password" id="pwd" name="registroPassword">
            </div>


        </div>
        <div class="form-group form-check">
            <label class="form-check-label">
                <input class="form-check-input" type="checkbox"> Recuerdame
            </label>
        </div>

        <?php
        //$respuesta = new RegistroController();
        //$respuesta->ctrRegistro();

        $registro = RegistroController::ctrRegistro();
        if ($registro == "ok") {
            echo '<div class="alert alert-success">El usuario ha sido registrado.</div>';
            ClearCache::limpiarCache();
        }
        ?>

        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
</div>