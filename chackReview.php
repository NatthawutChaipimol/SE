<?php
require_once 'DBindex.php';
error_reporting(E_ALL^E_NOTICE);

$pId = $_POST['pId'];
$cId = 1;
$date = date("Y-m-d h:i");
$detail = $_POST['detail'];
$score = $_POST['star'];
$bId = $_POST['bId'];

$con = new ConnectDBPro();
$con->addReview($pId,$cId,$date,$detail,$score,$bId);