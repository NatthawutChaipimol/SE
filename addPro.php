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
        <div class="box">
            <div id = "container">
            <form name="form1" action="checkPro.php" method="POST" enctype="multipart/form-data" onsubmit="return check()">
            <span>
                <center><h1>เพิ่มข้อมูลสินค้า</h1></center>
                <label class="LabelText" for="name">ชื่อสินค้า</label>
                    <input type="text" id = "pName" name="pName" value="" required>

                <label class="LabelText" >ราคาสินค้า</label>
                    <input type="text" id = "pPrice" name="pPrice" value="" required>
                    
                <label class="LabelText" >จำนวนสินค้า</label>
                    <input type="text" id = "pAmount" name="pAmount" value="" required>

                <label class="LabelText" >ประเภทของสินค้า</label>
                <input type="radio" name="pType" value="อาหาร" required><label>อาหาร</label><br>
                <input type="radio" name="pType" value="เครื่องดื่ม" required><label>เครื่องดื่ม</label> <br>
                <input type="radio" name="pType" value="ขนม" required><label>ขนม</label> <br>

                <label class="LabelText" >เลือกรูปของสินค้า</label>
                <div class="input-group mb-3 px-2 py-2 rounded-pill bg-white shadow-sm">
                    <input id="upload" type="file" name="pImg" value="" onchange="readURL(this);" class="form-control border-0" required>
                    <label id="upload-label" for="upload" class="font-weight-light text-muted">Choose file</label>
                    <div class="input-group-append">
                        <label for="upload" class="btn btn-light m-0 rounded-pill px-4"> <i class="fa fa-cloud-upload mr-2 text-muted"></i><small class="text-uppercase font-weight-bold text-muted">Choose file</small></label>
                    </div>
                </div>

                <div class="image-area mt-4"><img id="imageResult"  src="" alt="" class="img-fluid rounded shadow-sm mx-auto d-block"></div>
                <center>
                <input type="submit" name="submit" value="บันทึก" required>
                <input type="button"  class="button bt3" value="ยกเลิก" onclick="location.href='listProduct.php'" required></input>
                </center>
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
