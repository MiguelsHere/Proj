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

    //TO-DO

    function get_info(): bool
    {
        try {
        } catch (PDOException $e) {

            print($e->getMessage());
            $_SESSION['alert'] = "Erro. Tente novamente.";
            return false;
        }

        return true;
    }

    function update_info(): bool
    {
        try {
        } catch (PDOException $e) {

            print($e->getMessage());
            $_SESSION['alert'] = "Erro. Tente novamente.";
            return false;
        }

        return true;
    }

    //Estas vão precisar de password para mudar

    function update_email(): bool
    {
        try {
        } catch (PDOException $e) {

            print($e->getMessage());
            $_SESSION['alert'] = "Erro. Tente novamente.";
            return false;
        }

        return true;
    }

    function update_password(): bool
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
