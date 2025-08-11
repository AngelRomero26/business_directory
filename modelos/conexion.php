<?php
    class Conexion{
        static public function conectar (){
        #PDO("nombre del servidor"; "nombre BD", "usuario", "contrasena")

            try{
                $conexion = new PDO("mysql:host=localhost;dbname=canacintra","root","");

                $conexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $conexion ->exec("set names utf8");

                return $conexion;
            }catch(PDOException $e){
                return "Fallo".$e->getMessage();
            }
        }
        
    }