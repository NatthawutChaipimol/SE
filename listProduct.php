<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width-device-width, initial-scale-1.0">
        <meta http-equiv="X-UA-Compatible" content="ie-edge">
        <link rel="stylesheet" href="index.css">
        <link rel="stylesheet" href="bt.css" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700&display=swap" rel="stylesheet">
        <title>L'arbre Cafe</title>
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
    <?php include 'header.php'; ?>
        <center>
        <?php
            require_once './actionDBPro.php';
            $con = new ConnectDBPro();
            if($con->connect()){
                $sql = "SELECT * FROM `product` WHERE pStatus=0";
                $result = mysqli_query($con->connect(),$sql);
            }  else {
                echo 'Failed';
            } 
        ?>
            <form action="checkPro.php?id=1" method="POST">
            <table style="width: 70%">
                <tr>
                    <th>Delete</th>
                    <th>Update</th>
                    <th>pName</th>
                    <th>pPrice</th>
                    <th>pAmount</th>
                    <th>pType</th>
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
                    <td> <?php echo $row["pName"] ?> </td>
                    <td> <?php echo $row["pPrice"] ?> </td>
                    <td> <?php echo $row["pAmount"] ?> </td>
                    <td> <?php echo $row["pType"] ?> </td>
                    <td> <?php echo $row["pStatus"] ?> </td>
                    <td> <?php echo $row["pImg"] ?> </td>
                </tr>
                <?php
                    }
                }
                ?>
            </table>
                <input type="button"  class="button bt2" value="เพิ่มข้อมูล" onclick="location.href='addPro.php'"></input>
                <button class="button bt3" value="แก้ไขสถานะของสินค้า">แก้ไขสถานะของสินค้า</button>
            </form>
        <br>
    </center>
    
        <footer>
            
        </footer>
    </body>
</html>
