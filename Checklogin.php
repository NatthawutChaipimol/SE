<?php
error_reporting (E_ALL ^ E_NOTICE);
session_start();
require_once './ConnectDBLogin.php';
$s = $_REQUEST["s"];
if($s==1){
    if($_POST['cUsername'] == 'admin' && $_POST['cPassword'] == '1234'){
        
        $_SESSION['cUsername'] = $_POST['cUsername'];
        $_SESSION['status'] = '1';
    }else {
        $conn = new ConnectDB();
        $user = $conn->login($_POST['cUsername'], $_POST['cPassword']);
        $_SESSION['cUsername'] = $_POST['cUsername'];
    }
    if($_SESSION['status'] == '1'){
        header("Location:index.php");
    }else{
        echo" Error";
    }
}