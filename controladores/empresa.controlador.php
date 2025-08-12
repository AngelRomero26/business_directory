<?php

    require_once "modelos/empresa.modelo.php";

    class EmpresaControlador{
        private $modelo;

        public function __CONSTRUCT(){
            $this->modelo = new Empresa();
        }

        public function Inicio(){
            $totalEmpresas = $this->ctrMostrarTotal();
            if($this->ctrBuscador($resultados) === ''){
                
                $empresas = $this->ctrMostrarEmpresas();
            }else{
                $empresas = $this->ctrBuscador();
            }
            require_once "vistas/paginas/encabezado.php";
            require_once "vistas/paginas/inicio.php";
            require_once "vistas/paginas/pie.php";
        }
        public function ctrMostrarTotal(){
            
            return $this->modelo->mdlMostrarTotal();
        }

        public function ctrMostrarEmpresas(){
            //comente esta funcion porque la estoy pasando en la funcion del modelo buscar y se repite
            return $this->modelo->mdlMostrarEmpresas();
        }

        public function ctrMostrarEmpresasSinNulos(){

            return $this->modelo->mdlMostrarEmpresasSinNulos();
        }

        public function ctrBuscador($buscar = ''){
            
            $buscar = isset($_POST['buscar']) ? trim($_POST['buscar']) : '' ;
            // $bucar = trim($buscar);
            $resultados = $this->modelo->mdlBuscador($buscar);
            // var_dump($resultados);
            return $resultados;
            // var_dump($buscar);
            // if ($buscar === '') {
            //     $resultados = $this->modelo->mdlMostrarEmpresas();
            //     // var_dump($empresas);
            //     var_dump($buscar);
            //     // return $empresas;
            // } else {
            //     $resultados = $this->modelo->mdlBuscador($buscar);
                // var_dump($resultados);
                // foreach ($empresas as $e) {
                //     echo "<div>{$e->nomEmpresa}</div>";
                // }
                
            // }   
        }
        

         // static public function ctrMostrarBd(){

        //     $bd = "canacintra";

        //     $respuesta = Modelo::mdlMostrarBd($bd);

        //     return $respuesta;
        // }

        // static public function ctrMostrarEmpresas(){

        //     $tabla1 = "socios";
        //     $tabla2 = "empresas";

        //     $respuesta = Modelo::mdlMostrarEmpresas($tabla1, $tabla2);
        //     return $respuesta;
        // }

    }