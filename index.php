<!DOCTYPE html>
<html>
<head>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>L’ arbre Cafe</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <?php
        include 'header.php';
        require_once 'DBindex.php';
        require_once './ConnectDB_Ai.php';
        if($_SESSION["page"] == "null"){
            $con = new ConnectDBPro();
            $result = $con->getAllProduct();
        }else{
            $s=$_REQUEST["search"];
            $con = new connectDB_Ai();
            $result = $con->searchProduct($s);
            $_SESSION["page"] = "null";
        }

    ?>
    <form class="form-inline justify-content-center" action="checkAction.php?c=8" onsubmit="return checkSearch()" method="POST">
        <div class="btn-group mt-2">
            <div class="ml-2">
                <input class="form-control" id="Search" placeholder="คำที่ใช้ค้นหา" name="Search" style="color: #4C8577;border-color: #4C8577">
                <button type="submit" class="bt2">ค้นหา</button>
            </div>
        </div>
    </form>
    <div class="container pt-5">
        <div class="row">
            <div class="col-7 border border-success rounded p-3">
                <h3>รายการอาหาร</h3>
                <h5 class="mt-4">หมวดกาแฟ</h5>
                <hr>
                <div class="row">
                    <?php
                    while($row = $result->fetch_assoc()) {
                        if($row['pType']=="เครื่องดืม"){?>

                    <div class="col-4">
                        <div class="card" >
                            <img src="img/<?php echo $row['pImg']?>" class="card-img-top" alt="..." onclick="location.href = 'showReview.php?pId=<?php echo $row['pId']?>'" >
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

                                <a class="float-right" href="checkAction.php?c=1&pid=<?php echo $row['pId'] ;?>">
                                    <i class="fas fa-cart-plus float-right" style="font-size: 30px;color: #4E6E58" ></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php } } ?>
                </div>
                <h5 class="mt-4">หมวดขนม</h5>
                <hr>
                <div class="row">
                    <?php
                    if($_SESSION["page"] == "null"){
                        $con = new ConnectDBPro();
                        $result = $con->getAllProduct();
                    }else{
                        $s=$_REQUEST["search"];
                        $con = new connectDB_Ai();
                        $result = $con->searchProduct($s);
                        $_SESSION["page"] = "null";
                    }
                    while($row = $result->fetch_assoc()) {
                        if($row['pType']=="ขนม"){?>

                            <div class="col-4">
                                <div class="card" >
                                    <img src="img/<?php echo $row['pImg']?>" class="card-img-top" alt="..." onclick="location.href = 'showReview.php?pId=<?php echo $row['pId']?>'" >
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

                                        <a class="float-right" href="checkAction.php?c=1&pid=<?php echo $row['pId'] ;?>">
                                            <i class="fas fa-cart-plus float-right" style="font-size: 30px;color: #4E6E58" ></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php } } ?>
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
                        <?php
                        $sumall = 0;
                        $i=0;
                        foreach ($_SESSION["listProduct"] as $key => $value){
                        $conn = new connectDB_Ai();
                        $product = $conn->getProduct($key);
                        $row = $product->fetch_assoc();
                        $sumall += $row["pPrice"]*$value;
                        ?>
                        <tr>
                            <td><?php echo $row["pName"]; ?></td>
                            <td> <a href="checkAction.php?c=6&pid=<?php echo $row['pId'] ;?>"><i class="fas fa-minus-circle" style="font-size: 20px;color: gold"></i> </a><?php echo $value; ?><a href="checkAction.php?c=7&pid=<?php echo $row['pId'] ;?>"> <i class="fas fa-plus-circle" style="font-size: 20px;color: gold"></i></a></td>
                            <td><?php echo $row["pPrice"]*$value; ?>B.</td>
                        </tr>
                        <?php } ?>
                        <tr>
                            <td colspan="2" style="text-align: center; border-top: 0px; padding: 0">ราคารวม</td>
                            <td style="border-top: 0px; padding-top: 0;padding-bottom: 0"><?php echo $sumall ?>B.</td>
                        </tr>
                        <tr>
                            <td colspan="2" style="text-align: center; border-top: 0px; padding: 0">ค่าจัดส่ง</td>
                            <td style="border-top: 0px; padding-top: 0;padding-bottom: 0">20B.</td>
                        </tr>
                        <?php $sumall+=20; ?>
                        <tr>
                            <td colspan="2" style="text-align: center; border-top: 0px; padding: 0">ราคารวมสุทธิ</td>
                            <td style="border-top: 0px; padding-top: 0;padding-bottom: 0"><?php echo $sumall ?>B.</td>
                        </tr>
                        </tbody>
                    </table>
                <table class="table">
                    <tr>
                        <td style="text-align: center; border-top: 0px"><form action="checkAction.php?c=3" method='POST'>
                                <button type="submit" class="btn btn-outline-danger">ล้างสินค้า</button>
                            </form>
                        </td>
                        <td style="border-top: 0px"></td>
                        <td style="border-top: 0px"><form action="checkAction.php?c=4&total=<?php echo $sumall; ?>" method='POST'style="float: right">
                                <button type="submit" class="btn btn-outline-success" >สั่งสินค้า</button>
                            </form></td>
                    </tr>
                </table>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script>
        function ALerttest() {
            alert("TST5555");
        }function checkSearch() {
            let x = document.getElementById("SearchID");
            if(x.value == ""){
                window.alert('กรุณาใส่ข้อความที่ต้องการค้นหา')
                return false
            }
            else{
                return true
            }
        }
    </script>
</body>
</html>