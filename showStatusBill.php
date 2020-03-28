<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>index</title>
</head>
<body>
<?php
include 'header.php';
$bid = $_REQUEST["bid"];
require_once './ConnectDB_Ai.php';
$conn = new connectDB_Ai();
$bill = $conn->getBill($bid);
$val = $bill->fetch_assoc();
$orders = $conn->getOrder($bid);
$text = "";
if($val["bDeliveryStatus"] == "รอการชำระ") $text = "กรุณาชำระเงินก่อนค่ะ";
else if($val["bDeliveryStatus"] == "ตรวจสอบการชำระเงิน") $text = "กรุณารอสักครู่กำลังตรวจสอบการชำระเงินของคุณอยู่";
else if($val["bDeliveryStatus"] == "กำลังเตรียมอาหาร") $text = "กรุณารอสักครู่กำลังเตรียมอาหารให้คุณ";
else if($val["bDeliveryStatus"] == "กำลังส่ง") $text = "กรุณารอสักครู่กำลังไปส่งอาหารให้คุณ";
else if($val["bDeliveryStatus"] == "ส่งสำเร็จแล้ว") $text = "ขอบคุณที่ใช้บริการ กรุณารีวิวสินค้าเพื่อนำไปปรับปรุงต่อไปค่ะ";
?>
<div class="container">
    <div class="row pt-5">
        <div class="col-7">
            <div class="border border-success rounded" style="width: 100%; padding: 20px">
                <div class="" style="text-align: center">
                    <a class="font-weight-light">สถานะคำสั่งซื้อของคุณ</a>
                    <h2><?php echo $val["bDeliveryStatus"]; ?></h2>
                    <h4><?php echo $text; ?></h4>
                    <?php if($val["bDeliveryStatus"] == "รอการชำระ") {?>
                    <button type="button" class="bt2" style="width: 130px">แจ้งโอน</button>
                    <button type="button" class="bt3" style="width: 130px">ยกเลิกคำสั่งซื้อ</button>
                    <?php }?>
                </div>
            </div>
            <?php if($val["bDeliveryStatus"] == "รอการชำระ") {?>
            <div class="card mt-2 border-success rounded" style="width: 100%; padding: 25px">
                <div class="card-body" style="text-align: center">
                    <h3 class="font-weight-light " style="text-align: center">ช่องทางการชำระ</h3>
                    <img src="img/เลขที่บัญชี1.png" style="width: 25rem" class="mt-3">
                </div>
            </div>
            <?php } elseif ($val["bDeliveryStatus"] == "ส่งสินค้าสำเร็จ") {?>
            <div class="card mt-2 border-success rounded" style="width: 100%; padding: 25px">
                <div class="card-body" >
                    <form action="" method="post">
                        <h3 class="font-weight-light " style="text-align: center">รีวิวสินค้า</h3>
                        <?php
                        $j=1;
                        while($order = $orders->fetch_assoc()) {
                            $products = $conn->getProduct($order["pId"]);
                            $valPro = $products->fetch_assoc();
                            ?>
                            <div class="card mt-2" style="width: 100%;">
                                <div class="card-body" >

                                    <h5 class="mt-2"><?php echo $valPro["pName"] ?></h5>
                                    <input type="hidden" id = "star<?php echo $j; ?>" value="0" name = "star<?php echo $j; ?>">
                                    <?php
                                    for($i=1 ; $i<=5 ; $i++) {
                                        ?>
                                        <a onclick="clickStar( <?php echo $i ?>, <?php echo $j ?>)"><i class="far fa-star" style="font-size: 25px;color: gold" id="<?php echo $j ?>star<?php echo $i ?>"></i></a>
                                        <?php
                                    }
                                    ?>
                                    <textarea name="detail<?php echo $j; ?>" class="form-control mb-1 mt-2" style="border-color: #4C8577" placeholder="ตัวอย่างเช่น : อาหารอร่อยมาก"></textarea>
                                </div>
                            </div>
                            <?php
                            $j++;

                        }
                        ?><input type="hidden" value="<?php echo $j; ?>" name="j">
                        <button type="submit" class="bt2 float-right mt-2" style="width: 20%">รีวิว</button>
                    </form>
                </div>
            </div>
            <?php } ?>
        </div>
        <div class="col-1"></div>
        <div class="col-4">
            <div class="border border-success rounded p-3">
                <h3>รายการออเดอร์</h3>
                <table class="table">
                    <tbody>
                    <tr>
                        <td>สินค้า</td>
                        <td>จำนวน</td>
                        <td>ราคา</td>
                    </tr>
                    <?php
                    $orders = $conn->getOrder($bid);
                    while($order = $orders->fetch_assoc()) {
                        $products = $conn->getProduct($order["pId"]);
                        $valPro = $products->fetch_assoc();
                    ?>
                    <tr>
                        <td><?php echo $valPro["pName"]; ?></td>
                        <td><?php echo $order["oAmount"]; ?></td>
                        <td><?php echo $valPro["pPrice"]*$order["oAmount"]; ?>B.</td>
                    </tr>
                    <tr>
                        <td colspan="2">ค่าจัดส่ง</td>
                        <td>20B.</td>
                    </tr>
                        <tr>
                            <td colspan="2">ราคารวม</td>
                            <td><?php echo $val["bTotal"]; ?></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>

    function clickStar(n,j) {
        document.getElementById(j+"star1").className = "far fa-star";
        document.getElementById(j+"star2").className = "far fa-star";
        document.getElementById(j+"star3").className = "far fa-star";
        document.getElementById(j+"star4").className = "far fa-star";
        document.getElementById(j+"star5").className = "far fa-star";
        document.getElementById("star"+j).value = n;
        for(var i=1;i<=n;i++){
            document.getElementById(j+"star"+i).className = "fas fa-star";
        }
    }

</script>
</body>
</html>
