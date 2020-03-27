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
    <a class="navbar-brand text-light" href="index.php" style="color: #D8F4C6">
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
        <div class="box">
            <div id = "container">
            <form name="form1" action="checkPro.php" method="POST" enctype="multipart/form-data" onsubmit="return check()">
            <span>
                <center><h1>เพิ่มข้อมูลสินค้า</h1></center>
                <label class="LabelText" for="name">ชื่อสินค้า</label>
                    <input type="text" id = "pName" name="pName" value="">

                <label class="LabelText" >ราคาสินค้า</label>
                    <input type="text" id = "pPrice" name="pPrice" value="">
                    
                <label class="LabelText" >จำนวนสินค้า</label>
                    <input type="text" id = "pAmount" name="pAmount" value="">
                
                <label class="LabelText" >สถานะของสินค้า</label>
                <input type="radio" name="pStatus" value="0"><label>ขาย</label><br>
                <input type="radio" name="pStatus" value="1"><label>ไม่ขาย</label> <br>

                <label class="LabelText" >เลือกรูปของสินค้า</label>
                <div class="input-group mb-3 px-2 py-2 rounded-pill bg-white shadow-sm">
                    <input id="upload" type="file" name="pImg" value="" onchange="readURL(this);" class="form-control border-0" >
                    <label id="upload-label" for="upload" class="font-weight-light text-muted">Choose file</label>
                    <div class="input-group-append">
                        <label for="upload" class="btn btn-light m-0 rounded-pill px-4"> <i class="fa fa-cloud-upload mr-2 text-muted"></i><small class="text-uppercase font-weight-bold text-muted">Choose file</small></label>
                    </div>
                </div>

                <div class="image-area mt-4"><img id="imageResult"  src="" alt="" class="img-fluid rounded shadow-sm mx-auto d-block"></div>

                <input type="submit" name="submit" value="บันทึก">
                <input type="submit" name="submit" value="ยกเลิก">
            </span>
            <script src="checkjavascript.js"></script>
        </form>
        </div>
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
        <footer>
            
        </footer>
    </body>
</html>
