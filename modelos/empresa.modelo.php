<?php
    require_once "conexion.php";

    class Empresa{

        private $pdo;

        private $id_socio;
        private $logo;
        private $nomEmpresa;
        private $sector;
        private $nomSocio;
        private $numCelular;
        private $email;

        public function __CONSTRUCT(){
            $this->pdo = Conexion::Conectar();
        }

        public function getEmp_id_socio(): ?int{
            return $this->id_socio;
        }

        public function setEmp_id_socio(int $id){
            $this->id_socio = $id;
        }

        public function getEmp_logo(): ?string{
            return $this->logo;
        }

        public function setEmp_logo(string $log){
            $this->logo = $log;
        }

        public function getEmp_nomEmpresa(): ?string{
            return $this->nomEmpresa;
        }

        public function setEmp_nomEmpresa(string $Emp){
            $this->nomEmpresa = $Emp;
        }

        public function getEmp_sector(): ?string{
            return $this->sector;
        }

        public function setEmp_sector(string $sec){
            $this->sector = $sec;
        }

        public function getEmp_nomSocio(): ?string{
            return $this->nomSocio;
        }

        public function setEmp_socio(string $soc){
            $this->nomSocio = $soc;
        }

        public function getEmp_numCelular(): ?string{
            return $this->numCelular;
        }

        public function setEmp_numCelular(string $cel){
            $this->numCelular = $cel;
        }

        public function getEmp_email(): ?string{
            return $this->email;
        }

        public function setEmp_email(string $mail){
            $this->email = $mail;
        }

        public function mdlMostrarTotal(){
            try{
                $consulta = $this->pdo->prepare("SELECT COUNT(id_socio) AS Empresas FROM socios;");
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
                        socios.id_socio, socios.nomSocio, socios.numCelular, socios.email,
                        empresas.nomEmpresa, empresas.sector, empresas.logo
                        -- direcciones.colonia, direcciones.calle, direcciones.no_exterior, direcciones.no_interior, direcciones.codigo_postal, direcciones.municipio,
                        -- pagos.fecha_vencimiento

                    FROM socios
                    JOIN empresas ON empresas.socio_id = socios.id_socio
                    -- JOIN direcciones ON direcciones.empresa_id = empresas.id_empresa
                    -- JOIN pagos ON pagos.empresa_id = empresas.id_empresa
                    -- ORDER BY pagos.fecha_vencimiento ASC
                ;");
                $stmt->execute();
                return $stmt->fetchAll(PDO::FETCH_OBJ);
            }catch(Exception $e){
                die($e->getMessage());
            }
        }

        
        public function mdlMostrarEmpresasSinNulos() {
            try {
                $stmt = $this->pdo->prepare(
                    "SELECT 
                        socios.id_socio, socios.nomSocio, socios.numCelular, socios.email,
                        empresas.nomEmpresa,empresas.sector,empresas.logo
                        
                    FROM socios
                    JOIN empresas ON empresas.socio_id = socios.id_socio
                    WHERE 
                        socios.nomSocio IS NOT NULL AND socios.nomSocio != '' AND
                        socios.numCelular IS NOT NULL AND socios.numCelular != '' AND
                        socios.email IS NOT NULL AND socios.email != '' AND
                        empresas.nomEmpresa IS NOT NULL AND empresas.nomEmpresa != '' AND
                        empresas.sector IS NOT NULL AND empresas.sector != '' 
                        AND empresas.logo IS NOT NULL AND empresas.logo != ''
                    ORDER BY socios.id_socio"
                );
                $stmt->execute();
                return $stmt->fetchAll(PDO::FETCH_OBJ);
            } catch(Exception $e) {
                die($e->getMessage());
            }
        }

        public function mdlBuscador($buscar){
            try{
        
                $stmt = $this->pdo->prepare(
                    "SELECT 
                        socios.id_socio, socios.nomSocio, socios.numCelular, socios.email,
                        empresas.nomEmpresa, empresas.sector, empresas.logo, empresas.categoria
                        
                    FROM socios 
                    JOIN empresas ON empresas.socio_id = socios.id_socio
                    WHERE LOWER(nomEmpresa) LIKE :buscar OR LOWER(nomSocio) LIKE :buscar OR LOWER(categoria) LIKE :buscar"
                );
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

        public function mdlMostrarEmpresasSinLogo() {
            try {
                $stmt = $this->pdo->prepare(
                    "SELECT 
                        socios.id_socio, socios.nomSocio, socios.numCelular, socios.email,
                        empresas.nomEmpresa,empresas.sector,empresas.logo
                        
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

        public function mdlMostrarPaginacion($cantidad){
            $stmt = $this->pdo->prepare("SELECT $socios.*,empresas.*,FROM socios INNER JOIN empresas ON $tabla1.id_categoria = $tabla2.id_categorias ORDER BY $tabla2.id_articulo DESC LIMIT $cantidad");

            $stmt -> execute();

            return $stmt-> fetchAll();

            $stmt ->close();
            $stmt -> null;
        }


        static public function mdlMostrarBd($bd){
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $bd");

            $stmt -> execute();

            return $stmt->fetch();

            $stmt = null;
        }

        static public function mdlMostrarEmpre($tabla1, $tabla2){
            
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

        
    public function mdlBuscarEmpresas($termino) {
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
                socios.nomSocio LIKE :busqueda OR
                empresas.nomEmpresa LIKE :busqueda OR
                empresas.sector LIKE :busqueda
            ORDER BY socios.id_socio"
        );
        $busqueda = "%$termino%";
        $stmt->bindParam(':busqueda', $busqueda, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    } catch(Exception $e) {
        die($e->getMessage());
    }
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