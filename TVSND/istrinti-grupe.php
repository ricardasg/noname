<?php
require_once 'mysql.php';
$id = (int) $_GET['id'];
$q = "DELETE  FROM grupes WHERE id='$id'";
$db->query($q);
header('Location: grupe.php');
?>