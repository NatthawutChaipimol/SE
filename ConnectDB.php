<?php

class ConnectDB
{
    public function connect()
    {
        $dbhost = "localhost";
        $dbuser = "root";
        $dbpassword = "";
        $db = "db_se";
        $conn = new mysqli($dbhost, $dbuser, $dbpassword, $db) or
            die("Connect failed %s\n" . $conn->erro);
        mysqli_set_charset($conn, "utf8");
        return $conn;
    }
    public function login($cUsername, $cPassword){
        $sql = "SELECT * FROM `customer`WHERE cUsername = '".$cUsername."' AND cPassword = '".$cPassword."'";
        $result = $this->connect()->query($sql);
    }

    
}
