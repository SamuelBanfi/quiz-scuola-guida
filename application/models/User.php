<?php

class User
{
    private $name;
    private $surname;
    private $email;
    private $password;
    private $admin;

    public function __construct($name, $surname, $email, $password, $admin) {
        $this->name = $name;
        $this->surname = $surname;
        $this->email = $email;
        $this->password = $password;
        $this->admin = $admin;
    }

    /**
     * @return mixed
     */
    public function get_name()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function set_name($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function get_surname()
    {
        return $this->surname;
    }

    /**
     * @param mixed $surname
     */
    public function set_surname($surname)
    {
        $this->surname = $surname;
    }

    /**
     * @return mixed
     */
    public function get_email()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function set_email($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function get_password()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function set_password($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function get_admin()
    {
        return $this->admin;
    }

    /**
     * @param mixed $admin
     */
    public function set_admin($admin)
    {
        $this->admin = $admin;
    }
}