<?php
error_reporting(-1);
ini_set("display_errors", "On");
session_start();
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
<?php

$sx = $_SESSION['sx'] = $_POST['sx'] ?? $_SESSION['sx'] ?? 10;
$sy = $_SESSION['sy'] = $_POST['sy'] ?? $_SESSION['sy'] ?? 10;

if (isset($_POST['color'])) {
    setcookie('color', $_POST['color']);
}

$color = $_POST['color'] ?? $_COOKIE['color'] ?? 'gray';


$lines = $_SESSION["lines"] ?? [];
$nextLine = $_SESSION["next"] ?? null;

if (isset($_GET['x']) && isset($_GET['y'])) {

    $currentPoint = ['x' => $_GET['x'], 'y' => $_GET['y']];

    if ($nextLine) {
        if ($nextLine['A'] != $currentPoint) {
            $nextLine['B'] = $currentPoint;
            $lines[] = $nextLine;
            $nextLine = null;
        }
    } else {
        $nextLine['A'] = $currentPoint;
    }
}

$_SESSION["lines"] = $lines;
$_SESSION["next"] = $nextLine;


$scene = [];

for ($y = 0; $y < $sy; $y++) {
    for ($x = 0; $x < $sx; $x++) {
        $scene[$x][$y] = false;
    }
}

foreach ($lines as $line) {

    $startX = $line["A"]["x"];
    $stopX = $line["B"]["x"];

    $startY = $line["A"]["y"];
    $stopY = $line["B"]["y"];

    $dx = abs($stopX - $startX);
    $dy = abs($stopY - $startY);

    $stepX = $startX < $stopX ? 1 : -1;
    $stepY = $startY < $stopY ? 1 : -1;

    if ($dx == 0) {

        for ($y = $startY; $y != ($stopY + $stepY); $y += $stepY) {
            $scene[$startX][$y] = true;
        }

    } else if ($dy == 0) {

        for ($x = $startX; $x != ($stopX + $stepX); $x += $stepX) {
            $scene[$x][$startY] = true;
        }

    } else {

        $a = ($dy * $stepY) / ($dx * $stepX);
        $b = $startY - $a * $startX;

        if ($dx >= $dy) {
            for ($x = $startX; $x != ($stopX + $stepX); $x += $stepX) {
                $y = $a * $x + $b;
                $scene[$x][intval(round($y))] = true;
            }
        } else {
            for ($y = $startY; $y != ($stopY + $stepY); $y += $stepY) {
                $x = ($y - $b) / $a;
                $scene[intval(round($x))][$y] = true;
            }
        }
    }
}

for ($y = 0; $y < $sy; $y++) {

    echo '<div>';

    for ($x = 0; $x < $sx; $x++) {

        $cellColor = $color;

        if ($scene[$x][$y]) {
            $cellColor = 'white';
        }

        echo '<a class="block ' . $cellColor . '" href="?x=' . $x .'&y=' . $y . '"></a>';
    }

    echo '</div>';
}
?>
<br/>

<form method="post">
    Columns: <input type="text" name="sx">
    Rows: <input type="text" name="sy">
    <input type="submit" value="Change">
</form>

<form method="post">
    <select name="color">
        <option value="gray" <?= ($color == 'gray') ? 'selected' : ''; ?>>Gray</option>
        <option value="red" <?= ($color == 'red') ? 'selected' : ''; ?>>Red</option>
        <option value="green" <?= ($color == 'green') ? 'selected' : ''; ?>>Green</option>
        <option value="blue" <?= ($color == 'blue') ? 'selected' : ''; ?>>Blue</option>
    </select>
    <input type="submit" value="Change">
</form>

</body>
</html>