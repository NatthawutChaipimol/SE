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
        if($result->num_rows>0){
            $_SESSION['status'] = '1';
            $val = $result->fetch_assoc();
            $_SESSION['cid'] = $val['cid'];
            return $result;
        }
        else{
            
        header("Location:index.php");
        }

    }
    public function getCustomer($cid){
        $sql = "SELECT * FROM `customer` WHERE `cid` = '".$cid."'";
        return $this->connect()->query($sql);
    }
    
    
}
