<?php

class ConnectDBPro
{
    public function connect()
    {
        $dbhost = "26.216.63.243";
        $dbuser = "se2";
        $dbpassword = "";
        $db = 'db_se';
        $conn = new mysqli($dbhost,$dbuser, $dbpassword, $db);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        return $conn;
    }
    public function getAllProduct()
        {
        $result = mysqli_query($this->connect(),
            "SELECT * FROM `product`");
        if ($result->num_rows > 0) {
            return $result;
        } else {
            return null;
        }
    }
    public function getScoreOFProduct($pid){
        $sum = 0;
        $result = mysqli_query($this->connect(),
            "SELECT * FROM `review` where `pId` = $pid  ");
            if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $sum = $sum+$row['rScore'];
            }
            return $sum/$result->num_rows;
        }else{
            return 0 ;
        }
    }
   public function addReview($pId,$cId,$date,$detail,$score,$bId){
       mysqli_query($this->connect(),
           "INSERT INTO `review`(`pId`,`cId`,`rDate`,`rDetail`,`rScore`) value ('".$pId."','".$cId."','".$date."','".$detail."','".$score."')");
       mysqli_query($this->connect(),
           "UPDATE `bill` SET  `bReviewStatus` = 1 where `bId` = $bId");
       header("Location:showStatusBill.php?bid=1");

   }
}
