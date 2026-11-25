<?php

class Book
{
    private $conn;

    private function is_mod(): bool
    {
        if (!($_SESSION['is_mod'])) {
            return false;
        }

        try {
            $query = "SELECT is_mod FROM user WHERE user_id = :user_id";

            $stmt = $this->conn->prepare($query);

            $stmt->bindParam(":user_id", $_SESSION['user_id']);

            $stmt->execute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($row && $row['is_mod'] == 1) {
                return true;
            }
        } catch (PDOException $e) {
            print($e->getMessage());
            $_SESSION['alert'] = "Erro, tente novamente.";
            return false;
        }
        return false;
    }

    public function __construct($db)
    {
        $this->conn = $db;
    }

    function insert_book(int $isbn, string $title, string $publisher, string $genre, string $author, string $descriptionn): bool
    {
        try {

            if (!$this->is_mod()) {
                return false;
            }
            
            $query = "INSERT INTO book(ISBN, title, publisher, genre, author,book_description) VALUES(:ISBN, :title, :publisher, :genre, :author,:book_description)";

            $stmt = $this->conn->prepare($query);

            $stmt->bindParam(":ISBN", $isbn);
            $stmt->bindParam(":title", $title);
            $stmt->bindParam(":publisher", $publisher);
            $stmt->bindParam(":genre", $genre);
            $stmt->bindParam(":author", $author);
            $stmt->bindParam(":book_description", $descriptionn);

            $stmt->execute();
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

            $query = "SELECT ISBN, title, publisher, genre, author, book_description FROM book";

            $stmt = $this->conn->prepare($query);

            $stmt->execute();
        } catch (PDOException $e) {

            print($e->getMessage());
            $_SESSION['alert'] = "Erro. Tente novamente.";
            return false;
        }

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    function delete_book(int $id): bool
    {
        try {

            if (!$this->is_mod()) {
                return false;
            }

            $query = "DELETE FROM book WHERE book_id = :book_id";

            $stmt = $this->conn->prepare($query);

            $stmt->bindParam(":book_id", $id);

            $stmt->execute();
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

            if (!$this->is_mod()) {
                return false;
            }
        } catch (PDOException $e) {

            print($e->getMessage());
            $_SESSION['alert'] = "";
            return false;
        }

        return true;
    }
}
