<?php
require_once 'customerDB.php';
error_reporting(E_ALL^E_NOTICE);

$id = $_SESSION['cId'];
$ss = $_REQUEST["ss"];
$con=new ConnectDBCustomr();
if($ss == 1){

    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $name = $_POST['name'];
    $tel = $_POST['tel'];
    $address = $_POST['address'];
    $status = "1";

    $con = new ConnectDBCustomr();
    $sql = "SELECT `cUsername` FROM `customer` where cUsername = '".$user."'";
    $em = $con->getCustomer($_SESSION['cId']);
    $valEm = $em->fetch_assoc();
    $result = mysqli_query($con->connect(),$sql);
    if( ($result->num_rows == 0 ) || $user == $valEm["cUsername"]) {
        $con->InsertCustomer($user, $pass, $name, $tel, $address, $status);
    }
    else{
        header("Location:register.php?n=1");
    }
}
else if($ss == 2){
    $id = $_SESSION['cId'];
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $name = $_POST['name'];
    $tel = $_POST['tel'];
    $address = $_POST['address'];
    $status = "1";

    $con = new ConnectDBCustomr();
    $sql = "SELECT `cUsername` FROM `customer` where cUsername = '".$user."'";
    $em = $con->getCustomer($_SESSION['cId']);
    $valEm = $em->fetch_assoc();
    $result = mysqli_query($con->connect(),$sql);

    if( ($result->num_rows == 0 ) || $user == $valEm["cUsername"]){
        $con->UpdateCustomer($id,$user, $pass, $name, $tel, $address, $status);
    }else{
        header("Location:register_2.php?n=1");
    }

}
