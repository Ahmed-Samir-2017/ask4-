<?php
    class Database {
        public $isConn ;
        public $data_b ;

        public function __construct ($database_name = "chat", $host="localhost", $password="",$username = "root"){
            try{
                $this->data_b = new PDO("mysql:host=$host;dbname=$database_name;port=3306","$username",$password);
                $this->data_b->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->isConn = true ;
            }catch(PDOException $e){
                echo "Error" . $e->getMessage();
                exit ;
            }
        }
        public function __destruct (){
            $this->isConn = false ;
            $this->data_b = null;
        }
        public function getRow($query, $para = []){
            try {
                $stmt = $this->data_b->prepare($query);
                $stmt->execute($para);
                return $stmt->fetch(PDO::FETCH_ASSOC);
            }catch (PDOException $e){
                echo "Error" . $e->getMessage();
                exit ;
            }
        }
        public function getRows($query, $para = []){
            try{
                $stmt = $this->data_b->prepare($query);
                $stmt->execute($para);
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }catch (PDOException $e){

                throw new Exception($e->getMessage());
            }
        }
        public function insertRow($query, $para = []){
            try{
                $stmt =  $this->data_b->prepare($query);
                $stmt->execute($para);
                return true ;
            }catch (PDOException $e){
                throw new Exception($e->getMessage());
            }
        }
        public function updateRow($query, $para = []){
            $this->insertRow($query, $para);
        }
        public function deleteRow($query, $para = []){
            $this->insertRow($query, $para);
        }
    }
?>
