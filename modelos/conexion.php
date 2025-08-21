<?php
    class Conexion{

        const server = 'localhost';
        const BD ='cana_th';
        const user ='root';
        const pass ='';

        static public function conectar(){
            
            try{
                $conexion = new PDO("mysql:host=".self::server.";dbname=".self::BD, self::user, self::pass);

                $conexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $conexion ->exec("set names utf8");

                return $conexion;
            }catch(PDOException $e){
                return "Fallo".$e->getMessage();
            }
        }
        
    }