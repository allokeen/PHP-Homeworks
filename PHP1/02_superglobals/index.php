<?php
error_reporting(-1);
ini_set("display_errors", "On");
session_start();
//----------------------------------------------------- USTAWIENIE ZMIENNYCH DO BUDOWY TABLICY

$SX = isset($_POST['Poziom']) ? $_POST['Poziom'] : (isset($_SESSION['Poziom']) ? $_SESSION['Poziom'] : 10);
$SY = isset($_POST['Pion']) ? $_POST['Pion'] : (isset($_SESSION['Pion']) ? $_SESSION['Pion'] : 10);
$color = !empty($_POST['Kolor']) ? $_POST['Kolor'] : (isset($_COOKIE['Kolor']) ? $_COOKIE['Kolor'] : "gray");

setcookie('Kolor', $color, time() + (86400 * 30));

for ($i = 0; $i < $SX; $i++) {
    echo "<div>";
    for ($j = 0; $j < $SY; $j++) {
        echo "<a class=\"block ".$color."\"></a >";
        echo "\n";
    }
    echo "<div/>";
}

$_SESSION['Poziom'] = $SX;
$_SESSION['Pion'] = $SY;
?>

<html>
<head>
    <title>Superglobals</title>

    <style type="text/css">
        .block {
            display: inline-block;
            width: 30px;
            height: 30px;
            padding: 0px;
            margin: 0px;
        }
        .block:hover {
            background-color: lightgray;
        }
        .red {
            background-color: red;
        }
        .blue {
            background-color: blue;
        }
        .green {
            background-color: green;
        }
        .gray {
            background-color: gray;
        }
        .white {
            background-color: white;
        }
    </style>
</head>
<body>
<form method="post">
    X=<input type="number" name="Poziom">

    Y=<input type="number" name="Pion">
    <!----------------------------------------------------------- FORMULARZ-->
    Kolor= <select name="Kolor">
        <option value=""></option>
        <option value="gray">Szary</option>
        <option value="red">Czerwony</option>
        <option value="blue">Niebieski</option>
        <option value="green">Zielony</option>
        <option value="lightgray">Jasnoszary</option>
        <option value="white">Biały</option>
    </select>
    <input type="submit" value="Submit">
</form>
</body>
</html>
