<?php
error_reporting(-1);
ini_set("display_errors", "On");

$example_users = [
    1 => [
        'name' => 'John',
        'surname' => 'Doe',
        'age' => 21
    ],
    2 => [
        'name' => 'Peter',
        'surname' => 'Bauer',
        'age' => 16
    ],
    3 => [
        'name' => 'Paul',
        'surname' => 'Smith',
        'age' => 18
    ]
];

$uri = $_SERVER['REQUEST_URI'];
$id = substr($uri, strrpos($uri, '/') + 1);

switch($uri)
{
    case "":
    case '/':
        $file="../views/home.php";
        break;
    case "/user/".$id:
        $file="../views/user.php";
        break;
    default:
        $file = "../views/" . $uri . ".php";
        break;
}

require_once("layout.php");
?>
