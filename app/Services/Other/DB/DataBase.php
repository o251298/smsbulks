<?php


namespace App\Services\Other\DB;


class DataBase
{
    public static function getConnection()
    {
        $dsn = "mysql:host=".env('DB_HOST') .";dbname=" . env('DB_DATABASE') . ";charset=UTF8";
        $db = new \PDO($dsn, env('DB_USERNAME'), env('DB_PASSWORD'));
        return $db;
    }

    public static function save($sql)
    {
        $db =self::getConnection();
        $result = $db->prepare($sql);
        $response = $result->execute();
        if (!$response){
            throw new \Exception("Error sql");
        }
        return true;
    }

}
