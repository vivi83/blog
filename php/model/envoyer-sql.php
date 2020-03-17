<?php

$pdo=new PDO ("mysql:host=localhost;dbname=blog;charset=utf8;","root","");
$pdoStatement= $pdo-> prepare($requeteSQL);
$pdoStatement ->execute($tableau);
?>