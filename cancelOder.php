<?php
require_once 'DBindex.php';
error_reporting(E_ALL^E_NOTICE);
$bid = $_REQUEST["bid"];
$con = new ConnectDBPro();
$con->cancelOder($bid);
header("Location:index.php");