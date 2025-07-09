<?php
    class Conexion{
        static public function conectar (){
        #PDO("nombre del servidor"; "nombre BD", "usuario", "contrasena")

            $conexion = new PDO(
                "mysql:host=localhost;
                dbname=canacintra",
                "root",
                ""
            );
            $conexion ->exec("set names utf8");

            return $conexion;
        }
        
    }