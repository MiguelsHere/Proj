<?php
include_once 'Models/User.php';

class UserController
{
    private $db;
    private $user;

    public function __construct($db)
    {
        $this->db = $db;
        $this->user = new User($this->db);
    }
}
