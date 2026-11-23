<?php

class User
{
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    function register(string $userName, string $email, string $password): bool
    {
        try {
            $hash = password_hash($password, PASSWORD_DEFAULT);

            $query = "INSERT INTO user(user_name, email, password_hash) VALUES(:user_name, :email, :password_hash)";

            $stmt = $this->conn->prepare($query);

            $stmt->bindParam(":user_name", $userName);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":password_hash", $hash);

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
            $query = "SELECT user_id, user_name, email, password_hash FROM user WHERE email = :email;";

            $stmt = $this->conn->prepare($query);

            $stmt->bindParam(":email", $email);

            $stmt->execute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($row && password_verify($password, $row['password_hash'])) {
                session_regenerate_id(true);
                $_SESSION = [];
                $_SESSION['user_id']   = (int) $row['user_id'];
                $_SESSION['user_name'] = $row['user_name'];
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

            $query = "SELECT user_name, user_description, birth_date, is_mod FROM user WHERE user_name = :user_name and is_public = 1";

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
            $query = "SELECT user_name, email, user_description, birth_date, is_public, can_review FROM user WHERE user_id = :user_id";

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

    function profile_update_info(string $description, string $birth, bool $public): bool
    {
        try {

            $query = "UPDATE user SET user_description = :user_description, birth_date = :birth_date, is_public = :is_public WHERE user_id = :user_id";

            $stmt = $this->conn->prepare($query);

            $stmt->bindParam(":user_description", $description);
            $stmt->bindParam(":birth_date", $birth);
            $stmt->bindParam(":is_public", $public);
            $stmt->bindParam(":user_id", $_SESSION['user_id']);

            $stmt->execute();
        } catch (PDOException $e) {

            print($e->getMessage());
            $_SESSION['alert'] = "Erro. Tente novamente.";
            return false;
        }

        return true;
    }

    //Estas vão precisar de password para mudar

    function profile_update_email(string $email, string $password): bool
    {
        try {
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
        } catch (PDOException $e) {

            print($e->getMessage());
            $_SESSION['alert'] = "Erro. Tente novamente.";
            return false;
        }

        return true;
    }
}
