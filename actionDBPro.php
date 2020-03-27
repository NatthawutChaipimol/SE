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
    public function insert($pName , $pPrice, $pAmount, $pStatus, $pImg)
    {
        session_start();
        $sql =  "INSERT INTO `product`(`pName`, `pPrice`, `pAmount`, `pStatus`, `pImg`) 
        VALUES ('".$pName."','".$pPrice."','".$pAmount."','".$pStatus."' ,'".$pImg."'";

        if (mysqli_query($this->connect(), $sql)) {
            echo "Can Insert !!!";
        } else echo "Cannot Insert";
    }

    public function update($fname, $lname, $sex, $stuatus, $user, $pass)
    {
        session_start();
        $sql = "UPDATE `db_user` SET `user`=[value-2],`pass`=[value-3],`fname`=[value-4],`lname`=[value-5],`sex`=[value-6],
        `stuatus`=[value-7],`age`=[value-8],`email`=[value-9],`img`=[value-10] WHERE 1";
        echo $sql;
        if (mysqli_query($this->connect(), $sql)) {
            echo 'update';
            $_SESSION['fname'] = $fname;
            $_SESSION['lname'] = $lname;
            $_SESSION['sex'] = $sex;
            $_SESSION['stuatus'] = $stuatus;
            $_SESSION['user'] = $user;
            $_SESSION['pass'] = $pass;
            header("Location:member.php");
        } else echo "Cannot update";
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
