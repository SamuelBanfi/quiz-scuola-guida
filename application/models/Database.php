<?php

abstract class Database
{
    public static $hostname = "25.51.133.86";
    public static $user = "quiz_scuola_guida";
    public static $pass = "quiz_scuola_guida";

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