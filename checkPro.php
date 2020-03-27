<?php
require_once 'actionDBPro.php';
error_reporting(E_ALL^E_NOTICE);


$user = $_POST['user'];
$pass = $_POST['pass'];
$submit = $_POST['submit'];

$pId = $_REQUEST["id"];
$pName = $_POST['pName'];
$pPrice = (int)$_POST['pPrice'];
$pAmount = (int)$_POST['pAmount'];
$pStatus = (int)$_POST['pStatus'];
$pImg = $_POST["pImg"];

$con=new ConnectDBPro();
if($submit == 'บันทึก'){
    echo "ok";
    $con->insert($pName , $pPrice, $pAmount, $pStatus, $pImg);
}
else if($submit == 'ยืนยันการแก้ไข'){
    echo "ok";
    $con->update($pId,$pName , $pPrice, $pAmount, $pStatus, $pImg);
}else{
    echo "Not all";
}


