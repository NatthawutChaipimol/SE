<?php
require_once './actionDBPro.php';
$conn = new ConnectDBPro();
$user = $conn->login($_POST['username'],$_POST['password']);
$_SESSION['user'] = $_POST['username'];
header("Location:index.php");