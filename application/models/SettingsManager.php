<?php

class SettingsManager {
    public static function get_limit_errors() {
        require_once "application/models/Database.php";

        $conn = Database::get_connection();
        $query = "SELECT limite_errori FROM impostazioni";
        
        try {
            $stmt = $conn->prepare($query);
            $stmt->execute();

            $result = $stmt->fetchAll();

            return $result[0]["limite_errori"];
        } catch (PDOException $e) {
            return -1;
        }
    }

    public static function get_limit_time() {
        require_once "application/models/Database.php";

        $conn = Database::get_connection();
        $query = "SELECT limite_tempo FROM impostazioni";
        
        try {
            $stmt = $conn->prepare($query);
            $stmt->execute();

            $result = $stmt->fetchAll();

            return $result[0]["limite_tempo"];
        } catch (PDOException $e) {
            return -1;
        }
    }

    public static function get_limit_access() {
        require_once "application/models/Database.php";

        $conn = Database::get_connection();
        $query = "SELECT limite_accesso_utente FROM impostazioni";
        
        try {
            $stmt = $conn->prepare($query);
            $stmt->execute();

            $result = $stmt->fetchAll();

            return $result[0]["limite_accesso_utente"];
        } catch (PDOException $e) {
            return -1;
        }
    }
    
    public static function update_settings($limit_errors, $limit_time, $limit_access) {
        require_once "application/models/Database.php";

        $conn = Database::get_connection();
        $query = "UPDATE impostazioni SET limite_errori = :limit, limite_tempo = :time, limite_accesso_utente = :access";
        $params = array(
            ':limit' => $limit_errors,
            ':time' => $limit_time,
            ':access' => $limit_access
        );
        
        try {
            $stmt = $conn->prepare($query);
            $stmt->execute($params);

            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
}