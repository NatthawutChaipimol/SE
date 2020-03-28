<?php
class connectDB_Ai

{

    public function connect()
    {
        $dbhost = "26.212.245.113";
        $dbuser = "se2";
        $dbpassword = "";
        $db = 'db_se';
        $port=3306;
        $conn = new mysqli($dbhost,$dbuser, $dbpassword, $db);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        return $conn;
    }
    public function searchProduct($s){
        $sql = "SELECT * FROM `product` WHERE `pName` LIKE '%".$s."%'";
        return $this->connect()->query($sql);
    }
    public function updateStatusBill($bid, $status){
        $sql = "Update bill set bDeliveryStatus = '".$status."' where bId = ".$bid;
        if(mysqli_query($this->connect(), $sql)){
            header("Location:showStatusBill.php?bid=".$bid);
        } else {
            echo 'Insert Incomplete';
        }
    }
    public function getCustomer($cId){
        $sql = "SELECT * FROM `customer` WHERE `cId` = '".$cId."'";
        return $this->connect()->query($sql);
    }
    public function getBill($bId){
        $sql = "SELECT * FROM `bill` WHERE `bId` = '".$bId."'";
        return $this->connect()->query($sql);
    }
    public function getOrder($bId){
        $sql = "SELECT * FROM `orderinbill` WHERE `bId` = '".$bId."'";
        return $this->connect()->query($sql);
    }
    public function getProduct($pId){
        $sql = "SELECT * FROM `product` WHERE `pId` = '".$pId."'";
        return $this->connect()->query($sql);
    }
    public function getProductByPid($pid){
        $sql = "SELECT * FROM `product` WHERE `pId` = '".$pid."'";
        return $this->connect()->query($sql);
    }
    public function insertBill($bTotal,$cId,$array)
    {
        $sql =  "INSERT INTO `bill`( `bStatus`, `bTotal`, `bDeliveryStatus`, `cId` , `bReviewStatus`)
        VALUES (true,'".$bTotal."','รอการชำระ','".$cId."',false)";
        echo $sql;
        if (mysqli_query($this->connect(), $sql)) {
            $sql1 = "SELECT MAX(`bId`) as max FROM `bill`";
            $result = $this->connect()->query($sql1);
            $value1 = $result->fetch_assoc();
            foreach ($array as $key => $value){
                $product = $this->getProductByPid($key);
                $val2 = $product->fetch_assoc();
                $sql2 = "INSERT INTO `orderinbill`( `bId`, `pId`, `oAmount`)
                VALUES ('".$value1["max"]."','".$key."','".$value."')";
//                echo "<br>".$sql2;
                if(mysqli_query($this->connect(), $sql2)){
                    echo "true".$key;
                }else{
                    echo 'Insert Incomplete by key : '.$key;
                }
            }
            session_start();
            $_SESSION["listProduct"] = array();
            return $value1["max"];
        } else echo "Cannot Insert";
    }
}