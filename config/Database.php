<?php

class Database {

        //DB params

        private $host = 'localhost';
        private $db_name = 'hifive';
        private $username = 'admin123';
        private $password = 'hifive123';
        public $conn;


        //DB Conn

        public function connect(){
            // $this->conn = null;

            try{
                $this->conn = new PDO('mysql:host=' . $this->host. ';dbname=' .$this->db_name, $this->username, $this->password);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch(PDOException $e ){
                echo 'Connection  Error' . $e->getMessage();
            }
            error_log(json_encode($this->conn));
            return $this->conn; 
        }
}


?>