<?php
require_once 'actionDBPro.php';
error_reporting(E_ALL^E_NOTICE);
$user = $_POST['user'];
$pass = $_POST['pass'];
$submit = $_POST['submit'];

$pId = $_REQUEST["id"];
$chPay = $_REQUEST["sub"];
$pName = $_POST['pName'];
$pPrice = (int)$_POST['pPrice'];
$pAmount = (int)$_POST['pAmount'];
$pType = $_POST["pType"];
$pStatus = (int)$_POST['pStatus'];
$pImg = $_FILES["pImg"];

$payStatus = $_POST["payStatus"];
$payImg = $_FILES["payImg"];
$payDate = $_POST["payDate"];
$payFormat = $_POST["payFormat"];
$payTotal = $_POST["payTotal"];
$bId = $_REQUEST["bId"];


$con=new ConnectDBPro();
if($submit == 'บันทึก'){
    echo "ok";
    if(move_uploaded_file($pImg["tmp_name"], "$dir".$pImg["name"])){
        $con->insert($pName , $pPrice, $pAmount, $pType, 0, $pImg["name"]);
    }
}
else if($submit == 'ยืนยันการแก้ไข'){
    echo "ok";
    if(move_uploaded_file($pImg["tmp_name"], "$dir".$pImg["name"])){
        $con->update($pId,$pName , $pPrice, $pAmount,$pType, $pStatus, $pImg);
    }
}
else if($chPay == 'ยืนยัน'){
    echo "ok Pay";
    if(move_uploaded_file($payImg["tmp_name"], "$dir".$payImg["name"])){
        $con->insertPay($payStatus , $payImg , $payDate , $payFormat , $payTotal , $bId);
    }
}
else if($pid == 1 ){
    $dels = $_POST['checkbox'];
    $del = new ConnectDBPro();
    $del->delete($dels);
}else{
    echo "Not all";
}