<?php
session_start();
$c=$_REQUEST["c"];
echo $c;
require_once './ConnectDB_Ai.php';
$conn = new connectDB_Ai();
if($c==1){
    $pid = $_REQUEST["pid"];
    echo $pid;
    if (array_key_exists($pid, $_SESSION["listProduct"])) {
        $_SESSION["listProduct"][$pid] += 1;
    } else {
        $_SESSION["listProduct"][$pid] = 1;
    }
    print_r($_SESSION["listProduct"]);
    header("Location:index.php");
}elseif ($c==2){
    session_destroy();
    header("Location:index.php");
}elseif ($c==3){
    $_SESSION["listProduct"] = array();
    header("Location:index.php");
}elseif ($c==4){
    $total = $_REQUEST["total"];
    $bid = $conn->insertBill($total,$_SESSION["cid"],$_SESSION["listProduct"]);
    header("Location:showStatusBill.php?bid=".$bid);
}elseif ($c==5){
    $bid = $_REQUEST["bid"];
    $conn->updateStatusBill($bid,"ตรวจสอบการชำระเงิน");

}
elseif($c==6){
    $pid = $_REQUEST["pid"];
    $_SESSION["listProduct"][$pid] -= 1;
    if($_SESSION["listProduct"][$pid] == 0 ){
        unset($_SESSION["listProduct"][$pid]);
    }
    header("Location:index.php");
}
elseif($c==7){
    $pid = $_REQUEST["pid"];
    $_SESSION["listProduct"][$pid] += 1;
    header("Location:index.php");
}
elseif ($c==8){
    $s = $_POST["Search"];
    $_SESSION["page"] = "search";
    header("Location:index.php?search=".$s);
}
