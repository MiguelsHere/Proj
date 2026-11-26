<?php
include_once 'Common.php';

class Shelf
{
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }
}
