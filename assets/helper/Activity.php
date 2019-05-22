<?php

class Activity
{

    public static function connect()
    {
        require_once $_SERVER['DOCUMENT_ROOT'] . "/assets/database/Connection.php";

        $config = require $_SERVER['DOCUMENT_ROOT'] . "/assets/database/config.php";

        return Connection::make($config['database']);
        
    }

    public static function addActivity($name)
    {

        $Db = self::connect();

        date_default_timezone_set('Asia/Kuala_Lumpur');
        $time = date('Y-m-d H:i:s', time());
        
        $query = $Db->prepare("INSERT INTO activities (memberId, name, time) VALUES (:memberId, :name, :addTime)");

        $memberId = $_SESSION['logged_id'];

        $query->bindParam(':memberId', $memberId);

        $query->bindParam(':name', $name);

        $query->bindParam(':addTime', $time);

        $query->execute();

        // Clear the $query field. 
        $query = null;

        //Close the connection to the database.
        $Db = null;

    }

    public static function getActivities(){

        $Db = self::connect();
        
        $query = $Db->prepare("SELECT * FROM activities WHERE memberId = :memberId ORDER BY time DESC");
        
        $memberId = $_SESSION['logged_id'];

        $query->bindParam(':memberId', $memberId);

        $stat = $query->execute();

        $data = $query->fetchAll(PDO::FETCH_ASSOC);

        // Clear the $query field. 
        $query = null;

        //Close the connection to the database.
        $Db = null;


        return $data;
    }
}
