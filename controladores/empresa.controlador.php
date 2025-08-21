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

            require_once "vistas/paginas/modulos/encabezado.php";
            require_once "vistas/paginas/inicio.php";
            require_once "vistas/paginas/modulos/pie.php";
        }

        public function ctrMostrarTotal(){
            return $this->modelo->mdlMostrarTotal();
        }

        public function ctrMostrarEmpresas(){
            return $this->modelo->mdlMostrarEmpresas();
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

        public function ctrMostrarEmpresasSinNulos(){
            return $this->modelo->mdlMostrarEmpresasSinNulos();
        }

        public function ctrMostrarEmpresasSinLogo(){
            return $this->modelo->mdlMostrarEmpresasSinLogo();
        }
    }