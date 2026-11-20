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


    public function register()
    {

        if (!empty($_SESSION['user_id'])) {
            header("Location: index.php");
            exit;
        }

        if ($_POST) {
            if ($this->user->register(trim($_POST['user_name']), trim($_POST['email']), $_POST['password'])) {
                header("Location: index.php?action=login");
                exit;
            }
            header("Location: index.php?action=register");
            exit;
        }

        include 'Views/User/register.php';
    }

    public function login()
    {
        if (!empty($_SESSION['user_id'])) {
            header("Location: index.php");
            exit;
        }

        if ($_POST) {
            if ($this->user->login(trim($_POST['email']), $_POST['password'])) {
                header("Location: index.php?action=login");
                exit;
            }
            header("Location: index.php?action=register");
            exit;
        }

        include 'Views/User/login.php';
    }
}
