<?php
class connectDB_Ai
{
    public function connect()
    {
        $dbhost = "26.216.63.243";
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
    public function getAllProduct(){
        $sql = "SELECT * FROM product";
        return $this->connect()->query($sql);
    }
    public function getReviews($seller_id){
        $sql = "SELECT `reviews_star` FROM `reviews` WHERE `seller_id` = '".$seller_id."'";
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
        $sql =  "INSERT INTO `bill`( `bStatus`, `bTotal`, `bDeliveryStatus`, `cId`) 
        VALUES ([value-1],[value-2],[value-3],[value-4],[value-5]) 
        VALUES ('1','".$bTotal."','รอการชำระ','".$cId."')";

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
            return $value1["max"];
        } else echo "Cannot Insert";
    }
}