<?php


class RegistroController

{

    /**
     * metodo de registros de usuarios
     */

    public static function ctrRegistro()
    {
        if (isset($_POST["registroNombre"])) {

            $tabla = "usuarios";

            $datos = array(
                "nombre" => $_POST["registroNombre"],
                "email" => $_POST["registroEmail"],
                "password" => $_POST["registroPassword"]
            );

            return $respuesta = RegistrosModelo::registrarUsuario($tabla, $datos);
        }
    }

    /**
     * metodo de registros de usuarios desde el form de ajax
     */

    public static function ctrRegistrarUser($nombre, $email, $password)
    {
        if (isset($nombre) && isset($email) && isset($password)) {

            $tabla = "usuarios";

            $datos = array(
                "nombre" => $nombre,
                "email" => $email,
                "password" => $password
            );

            return $respuesta = RegistrosModelo::registrarUsuario($tabla, $datos);
        }
    }


    /*
    Método que busca usuarios para visualizar en la web.
     */

    public static function ctrSeleccionarRegistros($item, $valor)
    {
        $tabla = "usuarios";

        $respuesta = RegistrosModelo::mdlSeleccionarRegistros($tabla, $item, $valor);

        return $respuesta;
    }

    /*
    Método que busca todos los usuarios para visualizar en la tabla web por ajax.
     */

    public static function ctrVisualizarUsuarios($valor)
    {

        $respuesta = RegistrosModelo::mdlVisualizarUsuarios($valor);

        return $respuesta;
    }

    /*
    Método que ingresa por medio de login un usuario al sistema
    $tabla = tabla donde buscar registros
    $item = item donde voy a encontrar coincidencias
    $valor =valor a buscar
     */

    public function ctrIngresarAlSistema()
    {
        if (isset($_POST["ingresoEmail"])) {
            $tabla = "usuarios";
            $item = "email";
            $valor = $_POST["ingresoEmail"];
            $respuesta = RegistrosModelo::mdlSeleccionarRegistros($tabla, $item, $valor);
            if ($respuesta["email"] == $_POST["ingresoEmail"] && $respuesta["password"] == $_POST["ingresoPassword"]) {
                //echo '<div class="alert alert-success">Ingreso exitoso al sistema.</div>';

                $_SESSION["validarIngreso"] = "ok";
                //ingrese al sistema
                echo '<script>

                if(window.history.replaceState){
                window.history.replaceState(null, null, window.location.href);
                }

                window.location = "index.php?pagina=inicio";
                </script>';
            } else {

                echo '<div class="alert alert-danger">Error al ingresar al sistema. El email o contraseña no coinciden.</div>';
            }

            /*echo '<pre>';
        print_r($respuesta);
        '</pre>';*/
        }
    }

    /**
     * actualizar usuario
     */

    public static function ctrActualizarRegistro()
    {
        if (isset($_POST["actualizarNombre"])) {

            if ($_POST["actualizarPassword"] != "") {
                $password = $_POST["actualizarPassword"];
            } else {
                $password = $_POST["passwordActual"];
            }

            $tabla = "usuarios";

            $datos = array(
                "nombre" => $_POST["actualizarNombre"],
                "email" => $_POST["actualizarEmail"],
                "password" => $password,
                "id" => $_POST["id"]
            );

            $respuesta = RegistrosModelo::mdlActualizarUsuario($tabla, $datos);

            return $respuesta;
        }
    }

    /**
     * eliminar usuario
     */

    public function ctrEliminarRegistro()
    {

        if (isset($_POST["eliminarRegistro"])) {
            $tabla = "usuarios";
            $valor = $_POST["eliminarRegistro"];
            $respuesta = RegistrosModelo::mdlEliminarRegistro($tabla, $valor);

            if ($respuesta == 'ok') {
                echo '<script>

                if(window.history.replaceState){
                window.history.replaceState(null, null, window.location.href);
                }

                window.location = "index.php?pagina=inicio";
                </script>';
            }
        }
    }
}
