<?php

class ConnectDBPro
{
    public function connect()
    {
        $dbhost = "26.212.245.113";
        $dbuser = "se2";
        $dbpassword = "";
        $db = 'db_se';
        $port = 3306;
        $conn = new mysqli($dbhost,$dbuser, $dbpassword, $db);
         if ($conn->connect_error) {
             die("Connection failed: " . $conn->connect_error);
         }
        return $conn;
    }
    public function insert($pName , $pPrice, $pAmount, $pType, $pStatus, $pImg)
    {
        $sql =  "INSERT INTO `product`(`pName`, `pPrice`, `pAmount`, `pType`, `pStatus`, `pImg`) 
        VALUES ('".$pName."','.$pPrice.','.$pAmount.','".$pType."','.$pStatus.' ,'".$pImg."')";

        if (mysqli_query($this->connect(), $sql)) {
            echo "Can Insert !!!";
            header("Location:listProduct.php");
        } else echo "Cannot Insert";
        echo "'".$pName."','.$pPrice.','.$pAmount.','.$pStatus.' ,'".$pImg."'";
    }

    public function insertPay($payStatus , $payImg , $payDate , $payFormat , $payTotal , $bId)
    {
        $sql =  "INSERT INTO `pay`( `payStatus`, `payImg`, `payDate`, `payFormat`, `payTotal`, `bId`) 
        VALUES ('.$payStatus.','".$payImg."','".$payDate."','".$payFormat."','.$payTotal.','.$bId.')";

        if (mysqli_query($this->connect(), $sql)) {
            echo "Can Insert Pay !!!";
            header("Location:checkAction.php?c=5&bid=".$bId);
        } else echo "Cannot Insert Pay";
        echo "'.$payStatus.','".$payImg."','.$payDate.','".$payFormat."','.$payTotal.','.$bId.',";
    }
    public function update($pId, $pName , $pPrice, $pAmount, $pType, $pStatus, $pImg)
    {
        $sql =  "UPDATE `product` SET `pName`='".$pName."',`pPrice`='.$pPrice.',`pAmount`='.$pAmount.'
        ,`pType`='".$pType."',`pStatus`='.$pStatus.',`pImg`='".$pImg."' WHERE  `pId`=$pId";
        if (mysqli_query($this->connect(), $sql)) {
            header("Location:listProduct.php");
            echo "Can Update !!!";
        } else echo "Cannot Update";
        echo "$pId,'".$pName."','.$pPrice.','.$pAmount.','.$pStatus.' ,'".$pImg."'";
    }

    public function delete($del)
    {
        if($del != null){
<<<<<<< HEAD
            for($id=0;$id<sizeof($del) ;$id++){
            $sql = "UPDATE FROM `product` SET `pStatus` = 1  WHERE pId = ".$del[$id]."";
            $result = mysqli_query($this->connect(), $sql);
            }
            if($result){
                header("Location:listProduct.php");
            }  else {
                echo "Delete Failed";
            }
        }else{
            header("Location:listProduct.php");
=======
            $sql = "UPDATE FROM `product` SET `pStatus`= 1  WHERE  `pId`='".$del."'";
            $result = mysqli_query($this->connect(), $sql);
            if($result){
                header("Location:admin.php");
            }  else {
                echo "Cannot update";
            }
>>>>>>> 48bea26098e46a762fd2d827716b770f97cbf0d4
        }
    }
    
}
