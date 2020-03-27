<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="bt.css" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <meta charset="UTF-8">
</head>
<body>
<nav class="navbar navbar-light" style="background-color: #4C8577;">
    <a class="navbar-brand text-light" href="" style="color: #D8F4C6">
        <img src="img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
        L’ arbre Cafe
    </a>
    <form class="form-inline" action="" method='POST'>

        <a style="font-size: 20px;color: #D8F4C6" href="">
            Airada
        </a>

        <button class="bt2" type="submit">ออกจากระบบ</button>
    </form>   
</nav>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width-device-width, initial-scale-1.0">
        <meta http-equiv="X-UA-Compatible" content="ie-edge">
        <link rel="stylesheet" href="index.css">
        <link rel="stylesheet" href="bt.css" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700&display=swap" rel="stylesheet">
        <title>L'arbre Cafe</title>
    </head>
    <body>
        <center>
        <?php
            require_once './actionDBPro.php';
            $con = new ConnectDBPro();
            if($con->connect()){
                $sql = "SELECT * FROM `product`";
                $result = mysqli_query($con->connect(),$sql);
            }  else {
                echo 'Failed';
            } 
        ?>
            <form action="check.php?s=3" method="POST">
            <table>
                <tr>
                    <th>Delete</th>
                    <th>Update</th>
                    <th>pId</th>
                    <th>pName</th>
                    <th>pPrice</th>
                    <th>pAmount</th>
                    <th>pStatus</th>
                    <th>pImg</th>
                </tr>
                <?php
                if($result->num_rows > 0){
//                    echo $result->num_rows;
                    while ($row = mysqli_fetch_array($result)) {
                ?>
                <tr>
                    <td> <input type="checkbox" name="checkbox[]" value="<?php echo $row["pId"]; ?>"> </td>
                    <td> <a href="editPro.php?s=1&pId=<?php echo $row["pId"] ?>">Update</a> </td>
                    <td> <?php echo $row["pId"] ?> </td>
                    <td> <?php echo $row["pName"] ?> </td>
                    <td> <?php echo $row["pPrice"] ?> </td>
                    <td> <?php echo $row["pAmount"] ?> </td>
                    <td> <?php echo $row["pStatus"] ?> </td>
                    <td> <?php echo $row["pImg"] ?> </td>
                </tr>
                <?php
                    }
                }
                ?>
            </table>
                <button class="button bt2">เพิ่มข้อมูล</button>
                <button class="button bt3">ลบข้อมูล</button>
            </form>
        <br>
    </center>

        <footer>
            
        </footer>
    </body>
</html>
