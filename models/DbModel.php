<?php

require_once 'config/config.php';

class DbModel
{

    private $host;
    private $db;
    private $user;
    private $pass;
    private $driver;
    public $conection;

    public function __construct()
    {

        $this->host = constant('DB_HOST');
        $this->db = constant('DB_NAME');
        $this->user = constant('DB_USER');
        $this->pass = constant('DB_PASS');
        $this->driver = constant('DB_DRIVER');

        try {
            $this->conection = new PDO($this->driver.':host=' . $this->host . '; dbname=' . $this->db, $this->user, $this->pass);
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit();
        }

    }

}