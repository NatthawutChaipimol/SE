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
    ?>
    <div class="container pt-5">
        <div class="row">
            <div class="col-7 border border-success rounded p-3">
                <h3>รายการอาหาร</h3>
                <h5 class="mt-4">หมวดกาแฟ</h5>
                <hr>
                <div class="card-group">
                    <div class="card mr-2" style>
                        <img src="img/cafe-mocha.jpg" class="card-img-top" alt="..." style="height: 60%">
                        <div class="card-body">
                            <?php $star=3;
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
                            <h5 class="card-title">Espesso </h5>
                            <a>100B.</a>
                            <p class="float-right" type="submit" href="">
                                <i class="fas fa-cart-plus float-right" style="font-size: 30px;color: #4E6E58" aria-hidden="true"></i>
                            </p>

                        </div>
                    </div>
                    <div class="card mr-2">
                        <img src="img/coffee.jpg" class="card-img-top" alt="..." style="height: 60%">
                        <div class="card-body">
                            <?php $star=5;
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
                            <h5 class="card-title">Cafe latte</h5>
                            110B.
                            <a class="float-right" type="submit" href="">
                                <i class="fas fa-cart-plus float-right" style="font-size: 30px;color: #4E6E58" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                    <div class="card mr-2">
                        <img src="img/760865-img-1397794410-4.jpg" class="card-img-top" alt="..." style="height: 60%">
                        <div class="card-body">
                            <?php $star=3;
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
                            <h5 class="card-title">Cafe mocha  </h5>
                            110B.
                            <a class="float-right" type="submit" href="">
                                <i class="fas fa-cart-plus float-right" style="font-size: 30px;color: #4E6E58" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <h5 class="mt-4">หมวดขนมปัง</h5>
                <hr>
                <div class="card-group">
                    <div class="card mr-2">
                        <img src="img/e7bc9b3dace46d92bc47ca05cc97ec81.jpg" class="card-img-top" alt="..."style="height: 60%">
                        <div class="card-body">
                            <?php $star=2;
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
                            <h5 class="card-title">Miche  </h5>
                            100B.
                            <a class="float-right" type="submit" href="">
                                <i class="fas fa-cart-plus float-right" style="font-size: 30px;color: #4E6E58" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                    <div class="card mr-2">
                        <img src="img/ps2h6nwivQlSzAl20MX-o.jpg" class="card-img-top" alt="..."style="height: 60%">
                        <div class="card-body">
                            <?php $star=4;
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
                            <h5 class="card-title">Pain tessinois </h5>
                            50B.
                            <a class="float-right" type="submit" href="">
                                <i class="fas fa-cart-plus float-right" style="font-size: 30px;color: #4E6E58" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                    <div class="card mr-2">
                        <img src="img/uploded_istock-508489708-1557829184.jpg" class="card-img-top" alt="..."style="height: 60%">
                        <div class="card-body">
                            <?php $star=3.5;
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
                            <h5 class="card-title">Pain au seigle  </h5>
                            100B.
                            <a class="float-right" type="submit" href="">
                                <i class="fas fa-cart-plus float-right" style="font-size: 30px;color: #4E6E58" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
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
                            <td>Pain an seigle</td>
                            <td>2</td>
                            <td>200B.</td>
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