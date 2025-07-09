<?php

    class Controlador{

        static public function ctrMostrarBd(){

            $bd = "canacintra";

            $respuesta = Modelo::mdlMostrarBd($bd);

            return $respuesta;
        }

        static public function ctrMostrarEmpresas(){

            $tabla1 = "socios";
            $tabla2 = "empresas";

            $respuesta = Modelo::mdlMostrarEmpresas($tabla1, $tabla2);
            return $respuesta;
        }
    }

?>