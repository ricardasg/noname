<?php
require_once 'mysql.php';
if (isset($_GET['file']) && basename($_GET['file']) == $_GET['file']) {
    
    $filename = $_GET['file'];
} else {
    
    $filename = NULL;
}
$err = 'Sorry, the file you are requesting is unavailable.';
$folder="uploads/";
$filename2=$folder."".$filename;
unlink($filename2);
$q = "DELETE  FROM failai WHERE pavadinimas='$filename'";
$db->query($q);
header('Location:failai.php');
?>