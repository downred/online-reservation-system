<?php

class dbConnect
{
    private $conn = null;
    private $host = '127.0.0.1';
    private $dbname = 'online_reservation_system';
    private $username = 'root';
    private $password = '';

    protected function connectDB()
    {
        try {
            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->password);

            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Ka ndodhur nje problem gjate lidhjes me databazen {$this->dbname} " . $e->getMessage());
        }
        return $this->conn;
    }
}