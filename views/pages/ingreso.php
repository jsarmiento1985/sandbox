<div class="d-flex justify-content-center text-center">

    <form class="p-5 bg-light" method="POST">

        <div class="form-group">
            <label for="email">Correo electrónico:</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa-regular fa-envelope"></i></span>
                </div>
                <input type="email" class="form-control" placeholder="Ingrese email" id="email" name="ingresoEmail">
            </div>

        </div>
        <div class="form-group">
            <label for="pwd">Contraseña:</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa-duotone fa-key"></i></span>
                </div>
                <input type="password" class="form-control" placeholder="Ingrese password" id="pwd" name="ingresoPassword">
            </div>


        </div>
        <div class="form-group form-check">
            <label class="form-check-label">
                <input class="form-check-input" type="checkbox"> Recuerdame
            </label>
        </div>

        <?php
        $ingreso = new RegistroController();
        $ingreso->ctrIngresarAlSistema();
        ?>

        <button type="submit" class="btn btn-primary">Ingresar</button>
    </form>
</div>