<?php
require_once 'actionDBPro.php';
error_reporting(E_ALL^E_NOTICE);


$user = $_POST['user'];
$pass = $_POST['pass'];
$submit = $_POST['submit'];

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$tel = $_POST['tel'];
$email = $_POST['email'];

$food = $_POST['id_food'];
// echo $submit;
$con=new ConnectDB();
if ($submit == 'เข้าสู่ระบบ'){
    $con->ckuser($user, $pass);
}
else if ($submit == 'เข้าสู่ระบบร้าน'){
    $con->ckstore($user, $pass);
}
else if($submit == 'ยืนยันการสมัคร'){
    $status = "user";
    echo "ok";
    $con->insert($user,$pass,$fname, $lname, $status ,$email ,$tel);
}
else if($submit == 'ยืนยันการเเก้ไข'){
    
    $id=$_REQUEST['id'];
    $sql = "select * from user_food where id=".$id;
    $result= mysqli_query($con->connect(), $sql);
        
    if(mysqli_num_rows($result) == 1){
        $row=mysqli_fetch_array($result);
        $status = $row['status'];
        echo $status;
    }
    else echo "not";
    $con->updateuser($id,$user,$pass,$fname,$lname,$status,$email,$tel);
}
else if($submit == 'ยืนยันการเเก้ไขร้านค้า'){
    $id=$_REQUEST['id'];
    
    $con->updatestore($id,$user,$pass,$fname,$loc,$tel);
}
else if($submit == 'ยืนยันการเพื่มรายชื่อคนขับ'){
    $status = "driver";
    echo "ok";
    $con->insert($user,$pass,$fname, $lname, $status ,$email ,$tel);
}
else if($submit == 'ยืนยันการเพื่มร้านค้า'){
    
    echo "ok";
    $con->insertstore($user,$pass,$fname, $loc ,$tel);
}
else if($order == 'sent'){
    session_start();
    $p = 0;
    $food = $_POST['food'];
    echo "Food : ".$food;
    $result = mysqli_query($con->connect(),"SELECT MAX(id) FROM food_order");
    $row = mysqli_fetch_row($result);
    $sum = $row[0]+1;
    echo "<br> >>>".$row[0]."";
    echo "<br> sum ::".$sum."<br>";
    $con->insertBill($sum,$_SESSION['id'],$shop);
    while($p < count($food)){
        echo $food[$p];
        $con->insertOrder($sum,$food[$p]);
        $p = $p + 1;
    }
    header("Location:PageUser.php");


    // $sql = "select * from food_order where =".$shop;
    // $result= mysqli_query($con->connect(), $sql);
    // $row=mysqli_fetch_array($result);
}
else if($order == 'sented'){
    $con->clearOrder($shop);
}
else if($submit == 'เพื่มรายการ'){
    $price = $_POST['price'];
    #$id=$_REQUEST['id'];
    #echo $id;
    $con->insertfood($fname,$price,$stoer,$food_img);
}
else if($submit == 'ยืนยันการเเก้ไขรายการอาหาร'){
    
    $con->updatafood($fname,$price,$stoer,$food_img);
}
else{
    $d = $_REQUEST['d'];
    echo $d;
    if($d == 1){
        $id=$_REQUEST['ID'];
        $sql = "DELETE FROM `user_food` WHERE id=".$id;
        if(mysqli_query($con->connect(), $sql)){
            header("Location:Pageadmin.php");
        }else echo "Cannot ";
        echo $sql;
    }
    else if($d == 2 ){
        $id=$_REQUEST['ID'];
        $sql = "DELETE FROM `store` WHERE id=".$id;
        
        if(mysqli_query($con->connect(), $sql)){
            header("Location:Pageadmin.php");
        }else echo "Cannot ";
        echo $sql;
    }
    else if($d == 3){
        $id=$_REQUEST['ID'];
        $sql = "DELETE FROM `food` WHERE id_food=".$id;
        
        if(mysqli_query($con->connect(), $sql)){
            header("Location:Pagestore.php");
        }else echo "Cannot ";
        echo $sql;
    }
    
    
}
