<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="bt.css" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <meta charset="UTF-8">
</head>
<body>
<?php
session_start();
require_once './ConnectDB_Ai.php';
$conn = new connectDB_Ai();
if(!isset($_SESSION["listProduct"])){
    $_SESSION["listProduct"] = array();
}
if(!isset($_SESSION["page"])){
    $_SESSION["page"] = "null";
}
$bt = "เข้าสู่ระบบ";
$link = "login.php?cl=0";
$link2 = "";
$uname = "";
if(!isset($_SESSION["cid"])){
    $_SESSION["cid"] = "";
}

if($_SESSION["cid"] != "") {
    $customer = $conn->getCustomer($_SESSION["cid"]);
    $val= $customer->fetch_assoc();
    if($val["cName"] != "admin"){
        $link2 = "register_2.php";//โปรไฟล์
    }
    $uname = $val["cName"];
    $bt = "ออกจากระบบ";
    $link = "checkAction.php?c=2";
}
?>
<nav class="navbar navbar-light" style="background-color: #4C8577;">
    <a class="navbar-brand text-light" href="index.php" style="color: #D8F4C6">
        <img src="img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
        L’ arbre Cafe
    </a>
<!--    <form class="form-inline" action="--><?php //echo $link; ?><!--" method='POST'>-->




<!--        <button class="bt1 my-2 my-sm-0 ml-3" type="submit">--><?php //echo $bt; ?><!--</button>-->
<!--    </form>-->
    <div class="form-group" style="margin-bottom: 0px">
        <a style="font-size: 20px;color: #D8F4C6" href="register_2.php?n=0">
            <?php echo $uname; ?>
        </a>

        <?php if($uname == "admin"){ ?>
        <button class="bt1 my-2 my-sm-0 ml-3"  onclick="location.href='listProduct.php'">จัดการข้อมูลสินค้า</button>
        <button class="bt1 my-2 my-sm-0 ml-3" onclick="location.href='changeStatus.php'">จัดการข้อมูลการสั่งซื้อ</button>
         <button class="bt1 my-2 my-sm-0 ml-3" onclick="location.href='add.php'">จัดการข้อมูลลูกค้า</button>
        <?php } ?>
        <button class="bt1 my-2 my-sm-0 ml-3" type="submit" onclick="location.href='<?php echo $link; ?>'" ><?php echo $bt; ?></button>
    </div>

</nav>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>