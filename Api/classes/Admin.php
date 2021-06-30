<?php

class Admin {
    // DB stuff
    private $conn;


    // Constructor
    public function __construct($db) {
        $this->conn = $db;
    }

    public function admin_login(array $data) {
        $sql = "SELECT * FROM admins WHERE uname = ? AND pword = ?";
        $query = $this->conn->prepare($sql);
        $query->execute($data);
        if ($row = $query->fetch(PDO::FETCH_ASSOC)){
            return $row;
        }
    }


    function md5_encrypt($dt)
    {
        return md5($dt);
    }


}