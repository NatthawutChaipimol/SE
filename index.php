<!DOCTYPE html>
<html>
<head>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Hello, world!</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <?php
        include 'header.php';
        require_once 'DBindex.php';
        $con = new ConnectDBPro();
        $result = $con->getAllProduct();
    ?>
    <div class="container pt-5">
        <div class="row">
            <div class="col-7 border border-success rounded p-3">
                <h3>รายการอาหาร</h3>
                <h5 class="mt-4">หมวดกาแฟ</h5>
                <hr>
                <div class="row">
                    <?php while($row = $result->fetch_assoc()) {?>
                    <div class="col-4">
                        <div class="card">
                            <img src="img/<?php echo $row['pImg']?>" class="card-img-top" alt="..." >
                            <div class="card-body">
                                <?php

                                $star=$con->getScoreOFProduct($row['pId']);
                                for ($i = 1; $i <= 5; $i++) {
                                    if ($star >= 1) {
                                        echo '<i class="fas fa-star" style="font-size: 20px;color: gold"></i>';
                                    } else if($star >= 0.5){
                                        echo '<i class="fas fa-star-half-alt" style="font-size: 20px;color: gold"></i>';
                                    }else {
                                        echo '<i class="far fa-star" style="font-size: 20px;color: gold"></i>';
                                    }
                                    $star--;
                                }
                                ?>
                                <h5 class="card-title"><?php echo $row['pName'] ?> </h5>
                                <a><?php echo $row['pPrice'] ?></a>
                                <p class="float-right" type="submit" href="">
                                    <i class="fas fa-cart-plus float-right" style="font-size: 30px;color: #4E6E58" aria-hidden="true"></i>
                                </p>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
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
                        <tr>
                            <td>Cafe mocha</td>
                            <td>1</td>
                            <td>100B.</td>
                        </tr>
                        <tr>
                            <td colspan="2" style="text-align: center; border-top: 0px">ราคารวม</td>
                            <td style="border-top: 0px">300B.</td>
                        </tr>
                        </tbody>
                    </table>
                    <button type="button" class="btn btn-outline-danger">ล้างสินค้า</button>
                    <button type="button" class="btn btn-outline-success" style="float: right">สั่งสินค้า</button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>