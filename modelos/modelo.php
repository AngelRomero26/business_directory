<?php
    require_once "conexion.php";

    class Modelo{
        static public function mdlMostrarBd($bd){
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $bd");

            $stmt -> execute();

            return $stmt->fetch();

            $stmt = null;
        }

        static public function mdlMostrarEmpresas($tabla1, $tabla2){
            $stmt = Conexion::conectar()->prepare("SELECT 
        $tabla1.nombre_socio,
        $tabla1.num_celular,
        $tabla1.correo_electronico,

        $tabla2.nombre_empresa,
        $tabla2.sector,
        $tabla2.logo

        FROM $tabla1
        JOIN $tabla2 ON $tabla2.socio_id = $tabla1.id_socio
        ORDER BY $tabla1.id_socio");

        $stmt -> execute();

        return $stmt -> fetchAll();
        $stmt -> close();
        $stmt -> null();

        }



        // function safe($value) {
        //     return htmlspecialchars($value ?? 'NO REGISTRADO', ENT_QUOTES, 'UTF-8');
        // }
        // $conexion = Conexion::conectar();

        // $consulta = "SELECT 
        // socios.nombre_socio,
        // socios.num_celular,
        // socios.correo_electronico,

        // empresas.nombre_empresa,
        // empresas.sector,
        // empresas.logo

        // FROM socios
        // JOIN empresas ON empresas.socio_id = socios.id_socio
        // ORDER BY socios.id_socio
        // ";
    }


?>