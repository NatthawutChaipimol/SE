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
}
