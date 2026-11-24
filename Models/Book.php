<?php

class Book
{
    private $conn;

    private function is_mod() {}

    public function __construct($db)
    {
        $this->conn = $db;
    }

    function insert_book(): bool
    {
        try {
        } catch (PDOException $e) {

            print($e->getMessage());
            $_SESSION['alert'] = "";
            return false;
        }

        return true;
    }

    function fetch_books()
    {
        try {
            $query = "";

            $stmt = $this->conn->prepare($query);
        } catch (PDOException $e) {

            print($e->getMessage());
            $_SESSION['alert'] = "Erro. Tente novamente.";
            return false;
        }

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    function delete_book(): bool
    {
        try {
        } catch (PDOException $e) {

            print($e->getMessage());
            $_SESSION['alert'] = "";
            return false;
        }

        return true;
    }


    function update_book(): bool
    {
        try {
        } catch (PDOException $e) {

            print($e->getMessage());
            $_SESSION['alert'] = "";
            return false;
        }

        return true;
    }
}
