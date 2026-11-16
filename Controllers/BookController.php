<?php
include_once 'Models/Book.php';

class BookController
{
    private $db;
    private $book;

    public function __construct($db)
    {
        $this->db = $db;
        $this->book = new Book($this->db);
    }
}
