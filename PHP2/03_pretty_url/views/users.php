<?php include("index.php");
require_once("layout.php"); ?>
<html>
<p>Users:</p>
<ol>
    <?php $users = $example_users;
    foreach ($users as $user_id => $user) { ?>
        <li><a href="/user/<?= $user_id ?>"><?= $user['name'] ?></a></li>
    <?php } ?>
</ol>
</html>