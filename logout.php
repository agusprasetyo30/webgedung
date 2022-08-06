<?php
// Int Sesi
session_start();
$_SESSION = array();
 
// Hapus sesi
session_destroy();
 
// Otw ke login dengan alert logout
header("location: login.php?alert=logout");
exit;
?>