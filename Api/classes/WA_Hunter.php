<?php

class WA_Hunter {
    // DB stuff
    private $conn;

    // Constructor
    public function __construct($db) {
        $this->conn = $db;
    }

    // Get all record
    public function get_all() {
        $sql = "SELECT * FROM Classic_Ludo_Master";
        $query = $this->conn->prepare($sql);
        $query->execute(array());

        if($query->rowCount() > 0){
            $results = array();
            while($row = $query->fetch(PDO::FETCH_ASSOC)){
                $results[] =  $row;
            }
            return $results;

        }
    }
     
     // Get UserName
     public function get_UserOfID(string $_username) {
        $sql = "SELECT * FROM Classic_Ludo_Master where name = "+_username;
        $query = $this->conn->prepare($sql);
        $query->execute(array());

        if($query->rowCount() > 0){
            $results = array();
            while($row = $query->fetch(PDO::FETCH_ASSOC)){
                $results[] =  $row;
            }
            return $results;

        }
    }
    
    // Create new record
    public function create(array $data) {   
        
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
        $sql = "SELECT * FROM Classic_Ludo_Master where UserID = '$data[0]'";
        $query = $this->conn->prepare($sql);
        $query->execute(array());
        if($query->rowCount() > 0)
         {
           $sqlupdate =  "UPDATE Classic_Ludo_Master SET `name` = '$data[1]', `Rank` = '$data[2]', `Coins` = '$data[3]' WHERE UserID = '$data[0]'";
           $Updatequery = $this->conn->prepare($sqlupdate);
            $row =$Updatequery->execute();
            if($row>0)
            return true;
         }
        $sqlInsert = "INSERT INTO Classic_Ludo_Master(UserID,name,Rank,Coins)VALUES(?,?, ?,?)";
        $Insertquery = $this->conn->prepare($sqlInsert);
        // Execute
        $row = $Insertquery->execute($data);
        //checking result 
        if($Insertquery->rowCount() > 0){
            return true;
         
        }
            
        
        
    }


    

}