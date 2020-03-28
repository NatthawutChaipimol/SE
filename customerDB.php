
<?php

class ConnectDBCustomr
{
    public function connect()
    {
        $dbhost = "26.212.245.113";
        $dbuser = "se2";
        $dbpassword = "";
        $db = 'db_se';
        $port = 3306;
        $conn = new mysqli($dbhost, $dbuser, $dbpassword, $db);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        return $conn;
    }

    public function InsertCustomer($user, $pass, $name, $tel, $address, $status)
    {
        $sql = "INSERT INTO `customer`(`cName`, `cUsername`, `cPassword`, `cAddress`, `cTel`, `cStatus`) VALUES ( '" . $name . "','" . $user . "', '" . $pass . "', '" . $address . "','" . $tel . "','" . $status . "')";
        if (mysqli_query($this->connect(), $sql)) {
            header("Location:changeStatus.php");
        } else {
            echo 'Insert Incomplete';
        }
    }
    public function getCustomer($cid){
        $sql = "SELECT * FROM `customer` WHERE `cId` = '".$cid."'";
        return $this->connect()->query($sql);
    }
    public function UpdateCustomer($id,$user, $pass, $name, $tel, $address, $status)
    {
        $sql = "UPDATE `customer` SET `cName`='".$name."',`cUsername`='".$user."',`cPassword`='".$pass."',`cAddress`='".$address."',`cTel`='".$tel."',`cStatus`='".$name."' WHERE cId ='".$id."' ";
        if (mysqli_query($this->connect(), $sql)) {
            header("Location:changeStatus.php");
        } else {
            echo 'Insert Incomplete';
        }
    }
}