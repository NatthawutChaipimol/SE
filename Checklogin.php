<?php
error_reporting (E_ALL ^ E_NOTICE);
session_start();
require_once './ConnectDBLogin.php';
$s = $_REQUEST["s"];
if($s==1){

    if($_POST['username'] == 'admin' && $_POST['password'] == '1234'){
        $_SESSION['username'] = $_POST['username'];
        $_SESSION['status'] = 'admin';
    }else {
        $conn = new ConnectDB();
        $user = $conn->login($_POST['username'], $_POST['password']);
        echo $_SESSION['status'];
        $_SESSION['username'] = $_POST['username'];
    }
    if($_SESSION['status'] == 'admin' || $_SESSION['status'] == 'customer' ){
        //echo $_SESSION['cid'];
         header("Location:index.php");
    }else{
        header("Location:login.php?cl=1");
    }

}