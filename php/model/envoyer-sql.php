<?php

$pdo=new PDO ("mysql:dbname=blog;host=localhost;charset=utf8;","root","");
$pdoStatement= $pdo-> prepare($requeteSQL);
$pdoStatement ->execute($tableau);
?>