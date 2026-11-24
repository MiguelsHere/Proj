<?php

class Book
{
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    function insert_book(): bool {}

    function fetch_books(): bool {}

    function delete_book(): bool {}

    function update_book(): bool {}
}
