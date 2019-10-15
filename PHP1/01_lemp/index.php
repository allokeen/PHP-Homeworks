<?php

error_reporting(-1);
ini_set('display_errors', 'On');

$name = $_POST["name"] ?? null;
$surname = $_POST["surname"] ?? null;

if ($name && $surname)
{
    echo "Register as: $name $surname";
}

?>

<html>
<head>
    <title>Register</title>
</head>
<body>
<form method="post">
    Name: <input type="text" name="name">
    Surname: <input type="text" name="surname">
    <input type="submit" value="Register">
</form>
</body>
</html>

