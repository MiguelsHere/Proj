<?php
include_once 'Common.php';

class User
{
    private $conn;

    private function password_check(string $password): bool
    {
        try {
            $query = "SELECT password_hash FROM user WHERE user_id = :user_id;";

            $stmt = $this->conn->prepare($query);

            $stmt->bindParam(":user_id", $_SESSION['user_id']);

            $stmt->execute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$row || !password_verify($password, $row['password_hash'])) {
                $_SESSION['alert'] = "Erro. Tente novamente.";
                return false;
            }
        } catch (PDOException $e) {
            print($e->getMessage());
            $_SESSION['alert'] = "Erro. Tente novamente.";
            return false;
        }
        return true;
    }

    private function is_user_name_invalid(string $userName): bool
    {
        $size = mb_strlen($userName);

        if ($size > 50 || $size < 3) {
            $_SESSION['alert'] = "O nome de utilizador tem de ter entre 3 a 50 carateres!";
            return true;
        }

        return false;
    }

    private function is_password_invalid(string $password): bool
    {
        if (mb_strlen($password) < 8) {
            $_SESSION['alert'] = "A password tem de ter pelo menos 8 carateres!";
            return true;
        }

        return false;
    }

    public function __construct($db)
    {
        $this->conn = $db;
    }

    function register(string $userName, string $email, string $password): bool
    {
        try {
            if ($this->is_user_name_invalid($userName) || $this->is_password_invalid($password)) {
                return false;
            }
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $_SESSION['alert'] = "Email inválido!";
                return false;
            }

            $query = "INSERT INTO user(user_name, email, password_hash) VALUES(:user_name, :email, :password_hash)";

            $stmt = $this->conn->prepare($query);

            $stmt->bindParam(":user_name", $userName);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":password_hash", password_hash($password, PASSWORD_DEFAULT));

            $stmt->execute();
        } catch (PDOException $e) {

            print($e->getMessage());
            $_SESSION['alert'] = "Erro a registar conta. Tente novamente.";
            return false;
        }

        return true;
    }

    function login(string $email, string $password): bool
    {
        try {
            $query = "SELECT user_id, user_name, email, password_hash, is_mod FROM user WHERE email = :email;";

            $stmt = $this->conn->prepare($query);

            $stmt->bindParam(":email", $email);

            $stmt->execute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($row && password_verify($password, $row['password_hash'])) {
                session_regenerate_id(true);
                $_SESSION = [];
                $_SESSION['user_id']   = (int) $row['user_id'];
                $_SESSION['user_name'] = $row['user_name'];
                $_SESSION['is_mod'] = (bool) $row['is_mod'];
            } else {
                $_SESSION['alert'] = "Erro a entrar na conta. Tente novamente.";
                return false;
            }
        } catch (PDOException $e) {

            print($e->getMessage());
            $_SESSION['alert'] = "Erro a entrar na conta. Tente novamente.";
            return false;
        }

        return true;
    }

    function logout()
    {
        $_SESSION = [];
        session_destroy();
    }

    function profile_get_info(string $name)
    {
        try {

            $query = "SELECT user_name, user_description, birth_date, is_mod, created_in FROM user WHERE user_name = :user_name and is_public = 1";

            $stmt = $this->conn->prepare($query);

            $stmt->bindParam(":user_name", $name);

            $stmt->execute();
        } catch (PDOException $e) {

            print($e->getMessage());
            $_SESSION['alert'] = "Erro. Tente novamente.";
            return false;
        }
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    function profile_get_info_self()
    {
        try {
            $query = "SELECT user_name, email, user_description, birth_date, is_public, can_review, is_mod, created_in FROM user WHERE user_id = :user_id";

            $stmt = $this->conn->prepare($query);

            $stmt->bindParam(":user_id", $_SESSION["user_id"]);

            $stmt->execute();
        } catch (PDOException $e) {

            print($e->getMessage());
            $_SESSION['alert'] = "Erro. Tente novamente.";
            return false;
        }
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    function profile_update_info(string $userName, string $description, string $birth, bool $public): bool
    {
        try {

            if ($this->is_user_name_invalid($userName)) {
                return false;
            }

            $query = "UPDATE user SET user_name = :user_name, user_description = :user_description, birth_date = :birth_date, is_public = :is_public WHERE user_id = :user_id";

            $stmt = $this->conn->prepare($query);

            $stmt->bindParam(":user_name", $userName);
            $stmt->bindParam(":user_description", $description);
            $stmt->bindParam(":birth_date", $birth);
            $stmt->bindParam(":is_public", $public);
            $stmt->bindParam(":user_id", $_SESSION['user_id']);

            $stmt->execute();
        } catch (PDOException $e) {

            print($e->getMessage());
            $_SESSION['alert'] = "Erro. Nome de utilizador já em uso.";
            return false;
        }

        return true;
    }

    //testar estes

    function profile_update_email(string $email, string $password): bool
    {
        try {
            if (!$this->password_check($password)) {
                return false;
            }

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $_SESSION['alert'] = "Email inválido!";
                return false;
            }

            $query = "UPDATE user SET email = :email WHERE user_id = :user_id";

            $stmt = $this->conn->prepare($query);

            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":user_id", $_SESSION['user_id']);

            $stmt->execute();
        } catch (PDOException $e) {

            print($e->getMessage());
            $_SESSION['alert'] = "Erro. Tente novamente.";
            return false;
        }

        return true;
    }

    function profile_update_password(string $newpassword, string $password): bool
    {
        try {
            if (!$this->password_check($password)) {
                return false;
            }

            if ($this->is_password_invalid($newpassword)) {
                return false;
            }

            $hash = password_hash($newpassword, PASSWORD_DEFAULT);

            $query = "UPDATE user SET password_hash = :password_hash WHERE user_id = :user_id";

            $stmt = $this->conn->prepare($query);

            $stmt->bindParam(":password_hash", $hash);
            $stmt->bindParam(":user_id", $_SESSION['user_id']);

            $stmt->execute();
        } catch (PDOException $e) {

            print($e->getMessage());
            $_SESSION['alert'] = "Erro. Tente novamente.";
            return false;
        }

        return true;
    }
}
