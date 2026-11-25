<?php
session_start();

include_once 'config/Database.php';

include_once 'Controllers/UserController.php';
include_once 'Controllers/BookController.php';
include_once 'Controllers/ShelfController.php';

$database = new Database();
$db = $database->getConnection();

$userController = new UserController($db);
$bookController = new BookController($db);
$shelfController = new ShelfController($db);

$action = $_GET['action'] ?? "home";

if (isSet($_SESSION['user_name'])) {
    $name = $_GET['user_name'] ?? $_SESSION['user_name'];
}else{
    $name = $_GET['user_name'] ?? "none";
}

switch ($action) {
    case "books":
        $bookController->fetch_books();
        break;
    case "profile":
        $userController->profile($name);
        break;
    case "logout":
        $userController->logout();
        break;
    case "login":
        $userController->login();
        break;
    case "register":
        $userController->register();
        break;
    default:
    case "home":
        $shelfController->list_most_liked();
        break;
}
