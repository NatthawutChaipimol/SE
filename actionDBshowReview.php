<?php
class ActionReview{
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

}