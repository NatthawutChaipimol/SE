<?php
require_once './ConnectDBLogin.php';
$conn = new ConnectDB();
$user = $conn->login($_POST['cUsername'],$_POST['cPassword']);
$_SESSION['cUsername'] = $_POST['cUsername'];
header("Location:login.php");