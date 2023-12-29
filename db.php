<?php

class DbConnect
{
    public $db;

    public function __construct() {
        $this->db = new mysqli("127.0.0.1", "root", "", "php_elso_dolgozat");
        if ($this->db->connect_error) {
            die("Connection failed: " . $this->db->connect_error);
        }
    }
    public function query($sql) {
        return $this->db->query($sql);
    }
    public function prepare($sql) {
        return $this->db->prepare($sql);
    }
    public function bind_param($sql) {
        return $this->db->bind_param($sql);
    }
    public function execute($sql) {
        return $this->db->execute($sql);
    }
}