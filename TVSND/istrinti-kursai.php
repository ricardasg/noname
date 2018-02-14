<?php
require_once 'mysql.php';
$id = (int) $_GET['id'];
$q = "DELETE  FROM kursai WHERE id='$id'";
$db->query($q);
header('Location: kursai.php');
?>