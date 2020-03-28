<?php
require_once 'DBindex.php';
error_reporting(E_ALL^E_NOTICE);
$j = $_POST['j'];
$cId = 1;
$date = date("Y-m-d h:i");
$bId = $_POST['bId'];
for($i=0 ; $i<$j ; $i++){
    echo $_POST['pId'.$i]."<br>";
    echo $_POST['detail'.$i]."<br>";
    echo $_POST['star'.$i]."<br>";
    $con = new ConnectDBPro();
    $con->addReview($_POST['pId'.$i],$cId,$date,$_POST['detail'.$i],$_POST['star'.$i],$bId);
    header("Location:showStatusBill.php?bid=".$_POST['bId']);
}
