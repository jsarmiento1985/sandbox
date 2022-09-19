<?php

class Conexion
{

    public static function conectar()
    {
        /**
         * params:
         * nombre del server
         * nombre de la bd
         * usuario de la base de datos
         * contraseña de la base de datos
         */

        // The key is the "charset=utf8" part.
        try {
            $dsn = 'mysql:host=localhost;dbname=sandbox;charset=utf8';
            $dbh = new PDO($dsn, 'root', 'root');
            return $dbh;
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }
}
