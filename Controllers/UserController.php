<?php
include_once 'Models/User.php';

class UserController
{
    private $db;
    private $user;

    private function is_logged_in(): bool
    {
        if (!empty($_SESSION['user_id'])) {
            return true;
        }
        return false;
    }

    public function __construct($db)
    {
        $this->db = $db;
        $this->user = new User($this->db);
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

    public function profile(string $name)
    {
        if ($name == "none") {
            header("Location: index.php");
            exit;
        }
        if ($name == $_SESSION['user_name']) {
            $info = $this->user->profile_get_info_self();

            if ($_POST) {
                $this->user->profile_update_info($_POST['user_description'], $_POST['birth'], $_POST['public']);
                if ($_POST['password']) {
                    if ($_POST['email']) {
                        $this->user->profile_update_email($_POST['email'], $_POST['password']);
                    }
                    if ($_POST['new_password']) {
                        $this->user->profile_update_password($_POST['new_password'], $_POST['password']);
                    }
                }

                header("Location: index.php?action=profile");
                exit;
            }
        } else {
            $info = $this->user->profile_get_info($name);
        }

        include 'Views/User/profile.php';
    }

    #   TO-DO Fazer mod tirar privilegios de review e apagar própria conta

}
