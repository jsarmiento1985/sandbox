<?php

require_once "conexion.php";

class RegistrosModelo
{

    //registrar

    public static function registrarUsuario($tabla, $data)
    {
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(usuario, email, password) VALUES (:usuario, :email, :pass)");
        //bindParam
        $stmt->bindParam(":usuario", $data["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":email", $data["email"], PDO::PARAM_STR);
        $stmt->bindParam(":pass", $data["password"], PDO::PARAM_STR);

        if ($stmt->execute()) {
            return "ok";
        } else {
            print_r(Conexion::conectar()->errorInfo());
        }
        //$stmt->close();
        $stmt = null;
    }

    /*
    Método que ingresa por medio de login un usuario al sistema
    $tabla = tabla donde buscar registros
    $item = item donde voy a encontrar coincidencias
    $valor =valor a buscar
     */

    public static function mdlSeleccionarRegistros($tabla, $item, $valor)
    {
        if ($item == null && $valor == null) {
            $stmt = Conexion::conectar()->prepare("SELECT *, DATE_FORMAT(fecha_ingreso, '%d/%m/%Y') AS fecha_ingreso FROM $tabla ORDER BY id DESC");
            $stmt->execute();
            return $stmt->fetchAll();
            $stmt->closeCursor();
            $stmt = null;
        } else {
            $stmt = Conexion::conectar()->prepare("SELECT *, DATE_FORMAT(fecha_ingreso, '%d/%m/%Y') AS fecha_ingreso FROM $tabla WHERE $item = :$item ORDER BY id DESC");
            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetch();
            $stmt->closeCursor();
            $stmt = null;
        }
    }

    /**
     * Actualizar registro
     */

    public static function mdlActualizarUsuario($tabla, $data)
    {

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET usuario=:nombre, email=:email, password=:password WHERE id = :id");
        //bindParam
        $stmt->bindParam(":nombre", $data["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":email", $data["email"], PDO::PARAM_STR);
        $stmt->bindParam(":password", $data["password"], PDO::PARAM_STR);
        $stmt->bindParam(":id", $data["id"], PDO::PARAM_INT);

        if ($stmt->execute()) {
            return "ok";
        } else {
            print_r(Conexion::conectar()->errorInfo());
        }
        //$stmt->close();
        $stmt = null;
    }

    /**
     * Eliminar registro
     */

    public static function mdlEliminarRegistro($tabla, $valor)
    {
        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");
        $stmt->bindParam(":id", $valor, PDO::PARAM_INT);

        if ($stmt->execute()) {
            return "ok";
        } else {
            print_r(Conexion::conectar()->errorInfo());
        }
        //$stmt->close();
        $stmt = null;
    }


    /**
     * Actualizar registro
     */

    public static function mdlVisualizarUsuarios($data)
    {
        $tabla = "usuarios";
        $stmt = Conexion::conectar()->prepare("SELECT *, DATE_FORMAT(fecha_ingreso, '%d/%m/%Y') AS fecha_ingreso FROM $tabla where usuario like '%$data%'");
        $stmt->execute();
        $usuarios = $stmt->fetchAll();
        $json = array();

        foreach ($usuarios as $key => $value) {
            $json[] = array(
                'id' => $value["id"],
                'usuario' => $value["usuario"],
                'email' => $value["email"],
                'fechaIngreso' => $value["fecha_ingreso"]

            );
        }

        $jsonString = json_encode($json);
        return $jsonString;
        $stmt->closeCursor();
        $stmt = null;
    }
}
