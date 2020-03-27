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
    <style>
        #Time {
            border: 1px solid #ccc;
            color: #888;
            margin: 0.5em;
            vertical-align: middle;
            outline: 0;
            padding: 0.5em 1em;
            border-radius: 4px;
            width: calc(100% - 3em - 2px);
            font-family: sans-serif;
        }
        #upload {
            opacity: 0;
        }

        #upload-label {
            position: absolute;
            top: 50%;
            left: 1rem;
            transform: translateY(-50%);
        }

        .image-area {
            border: 2px dashed rgba(255, 255, 255, 0.7);
            padding: 1rem;
            position: relative;
        }

        .image-area::before {
            content: 'Uploaded image result';
            color: #fff;
            font-weight: bold;
            text-transform: uppercase;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 0.8rem;
            z-index: 1;
        }

        .image-area img {
            z-index: 2;
            position: relative;
        }
    </style>
</head>
<body>
<?php
include 'header.php'
?>

<div class="container mt-3 Body-Web" style="border-radius: 5px; border: 1px solid #4C8577;">

    <?php
        $Id = $_REQUEST["pId"];
        require_once './actionDBshowReview.php';
        $con2 = new ActionReview;
        if($con2->connect()){
            $sqlScore = "SELECT * FROM `review` where pId = ".$Id;
            $score = mysqli_query($con2->connect(),$sqlScore);
        }  else {
            echo 'Failed';
        }

        $star = 0;
        $stars = 0;
        $n = 0;
        if($score->num_rows > 0) {
            while ($rowStar = mysqli_fetch_array($score)) {
                $stars += $rowStar["rScore"];
                $n++;
            }
            $star = $stars/$n;
        }

        if($con2->connect()){
            $sqlPro = "SELECT * FROM `product` where pId = ".$Id;
            $Pros = mysqli_query($con2->connect(),$sqlPro);
        }  else {
            echo 'Failed';
        }


    ?>
    <div style="margin: 20px;">
        <h2 style="color: #4C8577">รีวิวสินค้า</h2>
        <table>
            <?php
            if($Pros->num_rows > 0) {
                $Pro = mysqli_fetch_array($Pros);

                ?>
                <tr>
                    <td>
                        <img src="img/<?php echo $Pro["pImg"]; ?>" width="200">
                    </td>
                    <td style="padding-left: 30px;">
                        <h3><?php echo $Pro["pName"]; ?></h3>
                        <?php echo $Pro["pPrice"]; ?> บาท <br>
                        <?php
                        while ($star > 0) {
                            if ($star >= 1) {
                                ?>
                                <i class="fas fa-star" style="color: gold">
                                <?php
                            } else if ($star >= 0.5) {
                                ?>
                                </i><i class="fas fa-star-half-alt" style="color: gold"></i>
                                <?php
                            } else {
                                ?>
                                </i><i class="far fa-star" style="color: gold"></i>
                                <?php
                            }
                            $star--;
                        }
                        ?>
                    </td>
                </tr>
                <?php
            }
            ?>
        </table>
        </table>

        <div style="margin-top: 20px;">
            <?php

                $con = new ActionReview;
                if($con->connect()){
                    $sql = "SELECT * FROM `review`";
                    $result = mysqli_query($con->connect(),$sql);
                }  else {
                    echo 'Failed';
                }

                if($result->num_rows > 0) {
                    //                    echo $result->num_rows;
                    while ($row = mysqli_fetch_array($result)) {
                        ?>
                        <div class="media p-3" style="margin-top: 20px;">
                            <img src="img/cactus.png" alt="John Doe" class="mr-3 mt-3 rounded-circle"
                                 style="width:60px;">
                            <div class="media-body">
                                <?php
                                    $sqlUser = "select cUsername from customer where cId = ".$row["cId"];
                                    $user = mysqli_query($con->connect(),$sqlUser);
                                    $row2 = mysqli_fetch_array($user)
                                ?>
                                <h4> <?php echo $row2["cUsername"]; ?><small><i>  Posted on <?php echo $row["rDate"]; ?></i></small></h4>
                                <p>
                                    <?php
                                        if($row["rScore"] >= 1) {
                                            ?>
                                            <i class="fa fa-star" style="color: gold"></i>
                                            <?php
                                        }
                                        if($row["rScore"] >= 2){
                                            ?>
                                            <i class="fa fa-star" style="color: gold"></i>
                                            <?php
                                        }
                                        if($row["rScore"] >= 3){
                                            ?>
                                            <i class="fa fa-star" style="color: gold"></i>
                                            <?php
                                        }
                                        if($row["rScore"] >= 4){
                                            ?>
                                            <i class="fa fa-star" style="color: gold"></i>
                                            <?php
                                        }
                                        if($row["rScore"] >= 5){
                                            ?>
                                            <i class="fa fa-star" style="color: gold"></i>
                                            <?php
                                        }
                                            ?>
                                <p><?php echo $row["rDetail"]; ?></p>
                            </div>
                        </div>

                        <?php
                    }
                }
            ?>

        </div>

    </div>
</div>

</body>
</html>