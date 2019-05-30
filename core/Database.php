<?php
    class Database{
        private $user, $pass, $dsn;
        
        public function __construct(){
            //INICIALIZA LOS ATRIBUTOS DE CONEXIÓN
            $db = require_once 'config/db.php';
            $this->user = $db["user"];
            $this->pass = $db["pass"];
            $this->dsn = $db["driver"].":dbname=".$db["data"].";host=".$db["host"].";";
        }
        private function connect(){
            //CONECTA A LA BASE DE DATOS MYSQL USANDO PDO
            try {
                $conn = new PDO($this->dsn,$this->user,$this->pass);
            } catch (PDOException $e) {
                echo 'Falló la conexión: '.$e->getMessage();
            }
            return $conn;
        }
        public function query($sql, $params = []){
            //EJECUTA UNA CONSULTA MYSQL
            $stmt=$this->connect()->prepare($sql);
            $stmt->execute($params);
            $rs=$stmt->fetch();
            //print_r($rs);
            return $rs;
        }
    }