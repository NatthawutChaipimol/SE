<?php

class ConnectDBPro
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
    public function insert($pName , $pPrice, $pAmount, $pStatus, $pImg)
    {
        $sql =  "INSERT INTO `product`(`pName`, `pPrice`, `pAmount`, `pStatus`, `pImg`) 
        VALUES ('".$pName."','.$pPrice.','.$pAmount.','.$pStatus.' ,'".$pImg."')";

        if (mysqli_query($this->connect(), $sql)) {
            echo "Can Insert !!!";
            header("Location:listProduct.php");
        } else echo "Cannot Insert";
        echo "'".$pName."','.$pPrice.','.$pAmount.','.$pStatus.' ,'".$pImg."'";
    }

    public function update($pId, $pName , $pPrice, $pAmount, $pStatus, $pImg)
    {
        $sql =  "UPDATE `product` SET `pName`='".$pName."',`pPrice`='.$pPrice.',`pAmount`='.$pAmount.'
        ,`pStatus`='.$pStatus.',`pImg`='".$pImg."' WHERE  `pId`=$pId";
        if (mysqli_query($this->connect(), $sql)) {
            header("Location:listProduct.php");
            echo "Can Update !!!";
        } else echo "Cannot Update";
        echo "$pId,'".$pName."','.$pPrice.','.$pAmount.','.$pStatus.' ,'".$pImg."'";
    }

    public function delete($del)
    {
        $sql = "Delete from db_user where iduser=" . $del;
        echo $sql;
        if (mysqli_query($this->connect(), $sql)) {
            header("Location:admin.php");
        } else echo "Cannot update";
    }
    
}
