<?php

abstract class Database
{
    public static $hostname = "127.0.0.1";
    public static $user = "root";
    public static $pass = "";

    public static function get_connection()
    {
        $db = null;

        try {
            $db = new PDO('mysql:host=' . self::$hostname . '; dbname=quiz_scuola_guida; port=3306',
                self::$user, self::$pass);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        return $db;
    }
}