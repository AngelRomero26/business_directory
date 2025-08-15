<?php

    require_once "modelos/empresa.modelo.php";

    class EmpresaControlador{
        private $modelo;

        public function __CONSTRUCT(){
            $this->modelo = new Empresa();
        }

        public function Inicio(){
            $buscar = trim($_GET['buscar'] ?? '');

            
            if($buscar ===''){
                
                $empresas = $this->ctrMostrarEmpresas();
                $totalEmpresas = $this->ctrMostrarTotal();
            }else{
                $empresas = $this->ctrBuscador($buscar);
                $totalEmpresas = (object)['Empresas' => $busqueda($numero)];

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

            $busqueda = $this->modelo->mdlBuscador($buscar);
            $empresas = $busqueda['resultados'];
            $numero = $busqueda['numero'];
            echo json_encode([

                'empresas' => $empresas,
                'numero' => $numero

            ]);
            
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