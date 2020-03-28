
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>สมัครสมาชิก</title>
    <link rel="stylesheet" type="text/css" href="loginCSS2.css" title="style1" >

</head>
<body>
<?php
include 'header_1.php';
require_once './customerDB.php';
$conn = new ConnectDBCustomr();
$customer = $conn->getCustomer($_SESSION['cId']);
$row = $customer->fetch_assoc();
?>
<div class="login-page"  >

    <div class="form tab-content">
        <form class="login-form" action='checkCustomer.php?ss=2' method='POST'>
            <?php
                            $n = $_REQUEST["n"];
                            if($n == 1){
                                echo "<p style=\"color: #EF3B3A\" >Username ไม่สามารถใช่ได้</p>";
                            }

            ?>
            <input type="text" id='user' placeholder="Username" name='user' value="<?php echo $row["cUsername"]; ?>"/>
            <input type='password' id='pass' placeholder='Password' name='pass' value="<?php echo $row["cPassword"]; ?>"/>
            <input type="text" id='name' placeholder="Name" name='name' value="<?php echo $row["cName"]; ?>"/>
            <input type="text" id='tel' placeholder="Phone number" name='tel' value="<?php echo $row["cTel"]; ?>"/>
            <textarea placeholder="Address" name='address' id='address'  style="width: 100%; border: none; background-color: #F2F2F2; height: 100px; padding: 15px; color: #555555;"><?php echo $row["cAddress"]; ?></textarea>
            <!--                <input type="text" id='address' placeholder="Address" name='address' aria-multiline="true" height="100"/>-->
            <button style="background-color: #4C8577" onclick=" return check()">สมัครสมาชิก</button>
        </form>


    </div>
</div>

<script>

    function check() {
        let user = document.getElementById("user");
        let pass = document.getElementById("pass");
        let name = document.getElementById("name");
        let tel = document.getElementById("tel");
        let address = document.getElementById("address");

        var phoneno = /^\(?[0]([0-9]{2})\)?[-]?([0-9]{3})[-]?([0-9]{4})$/;
        var passw=  /^[a-z0-9A-Z]{7,14}$/;
        var userf = /^[A-Za-z0-9]{4,14}$/;
        var nameformat = /^[A-Za-z0-9ก-ฮ_ะาิีึืุูเะแโั ]{2,30}$/;
        var OC = /^([0-1]?[0-9]|2[0-4]):([0-5][0-9])(:[0-5][0-9])?$/;

        if(user.value == "" || user.value.match(userf)){
            window.alert('กรุณากรอกข้อมูล Username')
            return false
        }
        else if(user.value == "admin"){
            window.alert('Username ไมสามารถใช่ได้')
            return false
        }
        else if(user.value == "admin"){
            window.alert('Username ไมสามารถใช่ได้')
            return false
        }
        else if(pass.value == "" || pass.value.match(passw)){
            window.alert('กรุณากรอกข้อมูล Password')
            return false
        }
        else if(name.value == "" || name.value.match(nameformat)){
            window.alert('กรุณากรอกข้อมูล Name')
            return false
        }
        else if(tel.value == "" || tel.value.match(phoneno)){
            window.alert('กรุณากรอกข้อมูล Phone number')
            return false
        }
        else if(address.value == "" || address.value.match(nameformat)){
            window.alert('กรุณากรอกข้อมูล Address')
            return false
        }

    }
</script>
</body>
</html>
