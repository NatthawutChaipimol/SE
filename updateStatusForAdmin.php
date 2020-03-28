<?php
    error_reporting(E_ALL^E_NOTICE);
    require_once './actionDBshowReview.php';
    $id = $_REQUEST['bid'];

    $con = new ActionReview;
    if($con->connect()){
        $sql = "SELECT * FROM `bill` where bId = ".$id;
        $bills = mysqli_query($con->connect(),$sql);
        $bill = mysqli_fetch_array($bills);

        $status = "";
        if($bill["bDeliveryStatus"] == "ตรวจสอบการชำระเงิน"){
            $status = "กำลังเตรียมอาหาร";
        }else if($bill["bDeliveryStatus"] == "กำลังเตรียมอาหาร"){
            $status = "กำลังส่ง";
        }else if($bill["bDeliveryStatus"] == "กำลังส่ง"){
            $status = "ส่งสินค้าสำเร็จ";
        }

        $con->updateStatus($id, $status);

    }  else {
        echo 'Failed';
    }