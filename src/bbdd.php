<?php

    class Database {
        private $hostname = "localhost";
        private $database = "";
        private $username = "root";
        private $password = "";
        private $charset = "utf8";
        
        function conectar(){

            try{
             
            $conexion = "mysql:host=" . $this->hostname . "; dbname=" . $this->database . 
            ", charset=" . $this->charset;

            //agregar a la conexion unas opciones
            //1.- Para que nos genere excepciones en caso de una falla con la conexion 
            //2.- Esto es una configuracion para evitar que las preparaciones para validar sea seguro y reales.
            $option = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false
            ];

            $pdo = new PDO($conexion, $this->username, $this->password, $option);
            
            //nos trae la conexion con la base de datos
            return $pdo;

        }   catch(PDOException $e){
                echo 'Error conexion: ' . $e->getMessage();
                exit;
        }
        
        }
        
    }

?>