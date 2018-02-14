<?php
require_once 'mysql.php';
$id = (int) $_GET['id'];
$q = "DELETE  FROM vartotojai WHERE id='$id'";
$db->query($q);
header('Location: vartotojai.php');
?>