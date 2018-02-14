<?php
require_once 'mysql.php';
$id = (int) $_GET['id'];
$q = "DELETE  FROM paskaitos WHERE id='$id'";
$db->query($q);
header('Location: paskaitos.php');
?>