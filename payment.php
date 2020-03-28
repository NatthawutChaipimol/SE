<!DOCTYPE html>
<html>
<head>
    <title>ชำระเงิน</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
    include 'header.php';
    require_once './actionDBPro.php';
    date_default_timezone_set("Asia/Bangkok");
    $date = date('Y-m-d H:i:s');
    $bId = $_REQUEST["bid"];
    $con = new ConnectDBPro();
    if ($con->connect()) {
        $sql = "SELECT * FROM `bill` Where bId=".$bId."";
        $result = mysqli_query($con->connect(), $sql);
        $row = mysqli_fetch_array($result);
    } else {
        echo 'Failed';
    }
?>
<!--<body style="background-image: linear-gradient(#4C8577, white); background-size: cover; background-repeat: no-repeat;">-->
<div style="width: 100%; margin-top: 100px; padding-right: 35%; padding-left: 35%; margin-bottom: 100px;">

    <table style="width: 100%; border: 1px solid #4C8577; background-color: white; padding: 10px;">
    <form name="formPay" action='checkPro.php?sub=ยืนยัน&bId=<?php echo $bId ?>' method="POST" enctype="multipart/form-data"  >
        <tr>
            <td colspan="2" style="padding: 10px;">
                <h2 style="color: #4C8577"> แจ้งโอนการชำระเงิน </h2>
            </td>
        </tr>
        <tr>
            <th style="width: 40%; padding-top: 10px; padding-left: 20px;">
                คำสั่งซื้อหมายเลข :
            </th>
            <th style="color: #4C8577; padding-top: 10px; padding-right: 20px;"">
                <?php  echo $row["bId"]; ?>
            </th>
        </tr>
        <tr>
            <th style="width: padding-top: 10px; padding-left: 20px;">
                จำนวนเงินที่ต้องชำระ :
            </th>
            <th style="color: #4C8577; padding-top: 10px; padding-right: 20px;"">
                 <?php  echo $row["bTotal"]; ?>
            </th>
        </tr>
        <tr>
            <th style="width: 40%; padding-top: 10px; padding-left: 20px;">
                จำนวนเงินที่โอน :
            </th>
            <th style="color: #4C8577; padding-top: 10px; padding-right: 20px;"">
                <div class="form-group">
                    <input type="text" class="form-control" id="price" name="payTotal" placeholder="กรุณากรอกจำนวนเงินที่โอน">
                </div>
            </th>
        </tr>
        <tr>
            <th style="width: 40%; padding-top: 10px; padding-left: 20px;">
                โอนจากธนาคาร :
            </th>
            <th style="color: #4C8577; padding-top: 10px; padding-right: 20px;"">
                <div class="form-group">
                    <select class="form-control" id="bank" name="payFormat">
                        <option value="ธนาคารกรุงไทย">ธนาคารกรุงไทย</option>
                        <option value="ธนาคารกรุงเทพ">ธนาคารกรุงเทพ</option>
                        <option value="ธนาคารไทยพาณิชย์">ธนาคารไทยพาณิชย์</option>
                        <option value="ธนาคารอิสลาม">ธนาคารอิสลาม</option>
                    </select>
                </div>
            </th>
        </tr>
        <tr>
            <th style="width: 40%; padding-top: 10px; padding-left: 20px;" hidden>
                เวลาที่ทำการโอน :
            </th>
            <th style="color: #4C8577; padding-top: 10px; padding-right: 20px;">
                <input id="Time" type="datetime" name="payDate" value="<?php echo $date ?>" hidden />
                <input id="Time" type="text" name="payStatus" value="0" hidden />
            </th>
        </tr>
        <tr>
            <th style="width: 40%; padding-top: 10px; padding-left: 20px;">
                อัพโหลดหลักฐานการโอน :
            </th>
            <td style="padding-left: 10px; padding-right: 10px;">
                <!-- Upload image input-->
                <div class="input-group mb-3 px-2 py-2 rounded-pill bg-white shadow-sm">
                    <input id="upload" type="file" onchange="readURL(this);" class="form-control border-0" name="payImg">
                    <label id="upload-label" for="upload" class="font-weight-light text-muted">Choose file</label>
                    <div class="input-group-append">
                        <label for="upload" class="btn btn-light m-0 rounded-pill px-4"> <i class="fa fa-cloud-upload mr-2 text-muted"></i><small class="text-uppercase font-weight-bold text-muted">Choose file</small></label>
                    </div>
                </div>
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <div class="image-area mt-4"><img id="imageResult" name="img" src="" alt="" class="img-fluid rounded shadow-sm mx-auto d-block"></div>
            </td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center; padding-bottom: 20px;">
                <input type="submit"  class="button bt2" value="ยืนยัน">
                <input type="button"  class="button bt3" value="ยกเลิก" onclick="location.href='showStatusBill.php?bid=<?php echo $bId ?>'" required></input>
            </td>
        </tr>
</form></table>

</div>

<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#imageResult')
                    .attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
    $(function () {
        $('#upload').on('change', function () {
            readURL(input);
        });
    });
    var input = document.getElementById( 'upload' );
    var infoArea = document.getElementById( 'upload-label' );
    input.addEventListener( 'change', showFileName );
    function showFileName( event ) {
        var input = event.srcElement;
        var fileName = input.files[0].name;
        infoArea.textContent = 'File name: ' + fileName;
    }
</script>
</body>
</html>