<?php
session_start();

include_once 'Controllers/UserController.php';
include_once 'Controllers/BookController.php';
include_once 'Controllers/ShelfController.php';

$userController = new UserController();
$bookController = new BookController();
$shelfController = new ShelfController();

$action = $_GET['action'];

switch ($action) {

    default:
        $shelfController->listMostLiked();
        break;
}
