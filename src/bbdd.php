<?php

class ConexionBd{
    private $direccion;
    private $usuario;
    private $contrasena;
    private $nombreBd;
    private $conexion;
    
    public function __construct($host,$user,$password,$databasename){
        $this->direccion=$host;
        $this->usuario=$user;
        $this->contrasena=$password;
        $this->nombreBd=$databasename;

        $this->conectarBD();
    }

    private function conectarBD(){
        try{
            $dsn="mysql:host={$this->direccion};dbname={$this->nombreBd};charset=utf8";
            $opciones=[
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ];
            $this->conexion=new PDO($dsn,$this->usuario,$this->contrasena,$opciones);
        
        }catch(PDOException $e){
            header("Location: src/error/error_tecnico.html");
            die("Error al conectar a la BD: ".$e->getMessage());
        }
     }

    public function obtenerConexion(){
        return $this->conexion;
    }
}

// $direccion="srv25.cpanelhost.cl";
// $usuario="cca94256_admin";
// $contrasena="carimu1717";
// $nombreDB="cca94256_bd_Carimu";

$direccion="localhost";
$usuario="root";
$contrasena="";
$nombreDB="VidaSana";

$conexionDB=new ConexionBd($direccion,$usuario,$contrasena,$nombreDB);

$con=$conexionDB->obtenerConexion();



?>