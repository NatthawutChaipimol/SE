<?php

class ConnectDB
{
    public function connect()
    {
        $dbhost = "26.212.245.113";
        $dbuser = "se2";
        $dbpassword = "";
        $db = "db_se";
        $conn = new mysqli($dbhost, $dbuser, $dbpassword, $db) or
            die("Connect failed %s\n" . $conn->erro);
        mysqli_set_charset($conn, "utf8");
        return $conn;
    }
    public function login($username, $password){
        $sql = "SELECT * FROM `customer`WHERE cUsername = '".$username."' AND cPassword = '".$password."'";

        $result = $this->connect()->query($sql);
        echo $result->num_rows;
        if($result->num_rows>0){
            $_SESSION['status'] = 'customer';
            $val = $result->fetch_assoc();
            $_SESSION['cId'] = $val["cId"];
            return $result;
        }else{
            header("Location:login.php?cl=1");
        }


    }
    
    
}
