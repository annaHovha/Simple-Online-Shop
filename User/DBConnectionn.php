<?php

class DBConnectionn
{
    protected $db;

    public function __construct()
    {
        try {
            $this->db = new PDO("mysql:host=localhost;dbname=onlineshop", 'root', '');
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die('Connection failed: ' . $e->getMessage());
        }
    }

    public function __destruct()
    {
        $this->db = null;
    }
}
