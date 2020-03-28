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
$pImg = $_FILES["pImg"]["name"];

$payStatus = $_POST["payStatus"];
$payImg = $_FILES["payImg"]["name"];
$payDate = $_POST["payDate"];
$payFormat = $_POST["payFormat"];
$payTotal = $_POST["payTotal"];
$bId = $_REQUEST["bId"];


$con=new ConnectDBPro();
if($submit == 'บันทึก'){
    echo "ok";
    $con->insert($pName , $pPrice, $pAmount,$pType, 0, $pImg);
}
else if($submit == 'ยืนยันการแก้ไข'){
    echo "ok";
    $con->update($pId,$pName , $pPrice, $pAmount,$pType, $pStatus, $pImg);
}
else if($chPay == 'ยืนยัน'){
    echo "ok Pay";
    $con->insertPay($payStatus , $payImg , $payDate , $payFormat , $payTotal , $bId);
}
else if($pId == "1" ){

    $sql = "DELETE FROM `product` WHERE `pId`='".$id."'";
    
    for($i=0;$i<count($_POST["checkbox"]);$i++)
	{
		if($_POST["checkbox"][$i] != "")
		{
            echo "Ok ".$_POST["checkbox"][$i]." ";
            $con->delete($_POST["checkbox"][$i]);
		}
	}
}else{
    echo "Not all";
}


