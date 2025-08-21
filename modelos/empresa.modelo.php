<?php
    require_once "conexion.php";

    class Empresa{

        private $pdo;

        public function __CONSTRUCT(){
            $this->pdo = Conexion::Conectar();
        }

        public function mdlMostrarTotal(){
            try{
                $consulta = $this->pdo->prepare(
                    "SELECT 
                        COUNT(id_socio) AS Empresas 
                    FROM socios;"
                );

                $consulta->execute();
                return $consulta->fetch(PDO::FETCH_OBJ);   
                
            }catch(Exception $e){
                die($e->getMessage());
            }   
        }

        public function mdlMostrarEmpresas(){
            try{
                $stmt = $this->pdo->prepare(
                    "SELECT 
                        socios.id_socio, 
                        socios.nomSocio, 
                        socios.numCelular, 
                        socios.email,

                        empresas.nomEmpresa, 
                        empresas.sector, 
                        empresas.logo,
                        pagos.fecha_vencimiento

                    FROM socios
                    JOIN empresas ON empresas.socio_id = socios.id_socio
                    JOIN pagos ON pagos.empresa_id = empresas.id_empresa
                    ORDER BY pagos.fecha_vencimiento DESC
                ;");

                $stmt->execute();
                return $stmt->fetchAll(PDO::FETCH_OBJ);

            }catch(Exception $e){
                die($e->getMessage());
            }
        }

        public function mdlBuscador($buscar){
            try{
        
                $stmt = $this->pdo->prepare(
                    "SELECT 
                        socios.id_socio, 
                        socios.nomSocio, 
                        socios.numCelular, 
                        socios.email,

                        empresas.nomEmpresa, 
                        empresas.sector, 
                        empresas.logo, 
                        empresas.categoria
                        
                    FROM socios 
                    JOIN empresas ON empresas.socio_id = socios.id_socio
                    WHERE LOWER(nomEmpresa) LIKE :buscar OR LOWER(nomSocio) LIKE :buscar OR LOWER(categoria) LIKE :buscar
                ;");

                $parametro = "%" . strtolower($buscar) . "%";
                $stmt->bindParam(':buscar', $parametro, PDO::PARAM_STR);
                $stmt->execute();

                $resultados= $stmt->fetchAll(PDO::FETCH_OBJ);
                $numero = count($resultados);

                return [
                    'resultados' =>$resultados,
                    'numero' =>$numero
                ];
            }catch(Exception $e){
                return [
                    'resultados' => [],
                    'numero' => 0
                ]; 
            }
        }

        public function mdlMostrarEmpresasSinNulos() {
            try {
                $stmt = $this->pdo->prepare(
                    "SELECT 
                        socios.id_socio, 
                        socios.nomSocio, 
                        socios.numCelular, 
                        socios.email,

                        empresas.nomEmpresa,
                        empresas.sector,
                        empresas.logo
                        
                    FROM socios
                    JOIN empresas ON empresas.socio_id = socios.id_socio
                    WHERE 
                        socios.nomSocio IS NOT NULL AND socios.nomSocio != '' AND
                        socios.numCelular IS NOT NULL AND socios.numCelular != '' AND
                        socios.email IS NOT NULL AND socios.email != '' AND
                        empresas.nomEmpresa IS NOT NULL AND empresas.nomEmpresa != '' AND
                        empresas.sector IS NOT NULL AND empresas.sector != '' AND
                        empresas.logo IS NOT NULL AND empresas.logo != ''
                    ORDER BY socios.id_socio
                ;");

                $stmt->execute();
                return $stmt->fetchAll(PDO::FETCH_OBJ);

            } catch(Exception $e) {
                die($e->getMessage());
            }
        }

        public function mdlMostrarEmpresasSinLogo() {
            try {
                $stmt = $this->pdo->prepare(
                    "SELECT 
                        socios.id_socio, 
                        socios.nomSocio, 
                        socios.numCelular, 
                        socios.email,

                        empresas.nomEmpresa,
                        empresas.sector,
                        empresas.logo
                        
                    FROM socios
                    JOIN empresas ON empresas.socio_id = socios.id_socio
                    WHERE empresas.logo IS NULL OR empresas.logo = 'assets/img/logo_'
                    ORDER BY socios.id_socio"
                );
                $stmt->execute();
                return $stmt->fetchAll(PDO::FETCH_OBJ);
            } catch(Exception $e) {
                die($e->getMessage());
            }
        }
    }

        