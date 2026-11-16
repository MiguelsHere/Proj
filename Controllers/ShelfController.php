<?php
include_once 'Models/Shelf.php';

class ShelfController
{
    private $db;
    private $shelf;

    public function __construct($db)
    {
        $this->db = $db;
        $this->shelf = new Shelf($this->db);
    }

    function listMostLiked() {}
}
