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

    private function is_logged_in(): bool
    {
        if (!empty($_SESSION['user_id'])) {
            return true;
        }
        return false;
    }

    public function register()
    {
        if ($this->is_logged_in()) {
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
        if ($this->is_logged_in()) {
            header("Location: index.php");
            exit;
        }

        if ($_POST) {
            if ($this->user->login(trim($_POST['email']), $_POST['password'])) {
                header("Location: index.php?action=profile");
                exit;
            }
            header("Location: index.php?action=login");
            exit;
        }

        include 'Views/User/login.php';
    }

    public function logout()
    {
        if ($this->is_logged_in()) {
            $this->user->logout();
        }
        header("Location: index.php");
    }
}
