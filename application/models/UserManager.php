<?php

class UserManager
{
    public static function check_login($email, $password) {
        require_once "application/models/Database.php";

        $conn = Database::get_connection();

        $query = "SELECT password FROM utente WHERE email = :email";
        $params = array(':email' => $email);

        $stmt = $conn->prepare($query);
        $stmt->execute($params);

        $result = $stmt->fetchAll();

        if (count($result) == 1) {
            return password_verify($password, $result[0]["password"]);
        } else {
            return false;
        }
    }

    public static function get_all_users() {
        require_once "application/models/Database.php";
        require_once "application/models/User.php";

        $conn = Database::get_connection();
        $query = "SELECT * FROM utente";

        $stmt = $conn->query($query);

        $result = $stmt->fetchAll();
        $users = array();

        foreach ($result as $key => $user) {
            $users[] = new User($user["nome"], $user["cognome"], $user["email"], $user["password"], $user["admin"]);
        }

        return $users;
    }

    public static function get_user($email) {
        require_once "application/models/Database.php";

        $users = self::get_all_users();

        foreach ($users as $key => $user) {
            if (strcmp($user->get_email(), $email) == 0) {
                return $user;
            }
        }

        return null;
    }

    public static function add($email, $name, $surname, $password, $admin) {
        require_once "application/models/Database.php";

        $password = password_hash($password, PASSWORD_BCRYPT);

        $conn = Database::get_connection();
        $query = "INSERT INTO utente(email, nome, cognome, password, admin) 
            VALUES(:email, :name, :surname, :pwd, :admin)";
        $params = array(
            ':email' => $email,
            ':name' => $name,
            ':surname' => $surname,
            ':pwd' => $password,
            ':admin' => $admin
        );

        try {
            $stmt = $conn->prepare($query);
            $stmt->execute($params);

            return true;
        } catch(PDOException $e) {
            return false;
        }
    }
}