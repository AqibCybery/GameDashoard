<?php

class Database {


    private $db_host = 'localhost';
    private $db_name = 'u377115506_Unity3D';
    private $db_user = 'u377115506_aqibhan143';
    private $db_pword = 'Aqibtouseefsoftwarehouse@123';
    private $conn;

    // Connection 
    public function connect() {
        $this->conn = null;
    
        try {
        $this->conn = new PDO('mysql:host=' . $this->db_host . ';dbname=' . $this->db_name,
           $this->db_user, $this->db_pword, 
           [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"]);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo 'connected';
            //exit();
        } catch(PDOException $e) {
            echo 'Connection Error: ' . $e->getMessage();
        }
        
        return $this->conn;
    }

    public function closeDb() {
        $this->conn = null;
    }
}