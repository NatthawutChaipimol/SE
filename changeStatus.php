<!DOCTYPE html>
<html>
<head>
    <title>Page Title</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="cssLayout.css" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

</head>
<body>
<?php
include 'header.php'
?>

<?php

        require_once './actionDBshowReview.php';
        $con = new ActionReview;
        if($con->connect()){
            $sql = "SELECT * FROM `bill`";
            $bills = mysqli_query($con->connect(),$sql);
        }  else {
            echo 'Failed';
        }

?>

<div class="container mt-3 Body-Web" style="border-radius: 5px; border: 1px solid #4C8577;">


    <div style="margin: 20px;">

        <div class="row">
            <div class="col-8">
                <table style="width: 90%;">
                    <tr style="border-bottom: 1px solid #4C8577;">
                        <th style="width: 20%;">
                            Bill ID
                        </th>
                        <th style="width: 60%;">
                            Bill Status
                        </th>
                        <th style="width: 20%;">

                        </th>
                    </tr>
                    <?php
                        if($bills->num_rows > 0) {
                            $n = 0;
                            while ($bill = mysqli_fetch_array($bills)) {
                                if ($bill["bDeliveryStatus"] != "ส่งสำเร็จแล้ว" && $bill["bDeliveryStatus"] != "รอการชำระ") {

                                    ?>
                                    <tr>
                                        <td>
                                            <?php echo $bill["bId"]; ?>
                                        </td>
                                        <td>
                                            <?php echo $bill["bDeliveryStatus"]; ?>
                                        </td>
                                        <td>
                                            <button class="bt2" onclick="showDetail(<?php echo $bill["bId"]; ?>, '<?php echo $bill["bDeliveryStatus"]; ?>')">Update</button>
                                        </td>
                                    </tr>
                                    <?php
                                    $n++;
                                }
                            }
                        }
                    ?>
                </table>
            </div>
            <div class="col-4">
                <?php
                $que = "SELECT * FROM `bill`";
                $bills = mysqli_query($con->connect(),$que);
                if($bills->num_rows > 0) {
                    while ($bill = mysqli_fetch_array($bills)) {
                        if ($bill["bDeliveryStatus"] != "ส่งสำเร็จแล้ว") {
                            $sql2 = "SELECT * FROM `orderinbill` where bid = ".$bill["bId"];
                            $orders = mysqli_query($con->connect(),$sql2);

                            ?>
                            <div id="detail<?php echo $bill["bId"]; ?>" style="display: none;">
                                <h3 id="bId">Bill ID : <?php echo $bill["bId"]; ?></h3>
                                <table style="width: 90%;">
                                    <tr style="border-bottom: 1px solid #4C8577;">
                                        <th>
                                            รายการอาหาร
                                        </th>
                                        <th>
                                            จำนวน
                                        </th>
                                    </tr>
                                    <?php
                                        $total = 0;
                                        if($orders->num_rows > 0) {
                                            while ($order = mysqli_fetch_array($orders)) {
                                                $sql3 = "SELECT * FROM `product` where pid = " . $order["pId"];
                                                $products = mysqli_query($con->connect(), $sql3);
                                                $product = mysqli_fetch_array($products);
                                                $total += $order["oAmount"] * $product["pPrice"];
                                                ?>
                                                <tr>
                                                    <td>
                                                        <?php echo $product["pName"]; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $order["oAmount"]; ?>
                                                    </td>
                                                </tr>
                                                <?php
                                            }

                                                ?>
                                    <tr>
                                        <th>
                                            ราคารวม
                                        </th>
                                        <th>
                                            <?php
                                                echo $total;
                                                }
                                            ?>
                                        </th>
                                    </tr>
                                    <?php
                                        if($bill["bDeliveryStatus"] == "ตรวจสอบการชำระเงิน") {
                                            $sql4 = "SELECT * FROM `pay` where bid = " . $bill["bId"];
                                            $imgs = mysqli_query($con->connect(), $sql4);
                                            $img = mysqli_fetch_array($imgs);
                                            ?>
                                            <tr>
                                                <td colspan="2">
                                                    <img src="img/<?php echo $img["payImg"]; ?>">
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                            ?>
                                    <tr>
                                        <td colspan="2" style="text-align: center;padding-top: 10px;">
                                            <a href="updateStatusForAdmin.php?bid=<?php echo $bill["bId"]; ?>"><button class="bt2">Update สถานะ</button></a>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <?php

                        }
                    }
                }
                ?>

            </div>
        </div>

    </div>
</div>
<script>


        function showDetail(bId, status) {

            console.log(document.getElementById("detail"));
            $select = "#detail"+bId;
            $($select).show();
            // if (status == "ตรวจสอบการชำระเงิน") {
            //
            // } else {
            //     $select = "#detail"+bId;
            //     $($select).show();
            //
            // }
        }


</script>

</body>
</html>