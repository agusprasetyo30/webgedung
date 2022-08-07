<?php
// Int Sesi
session_start();
$_SESSION = array();
 
// Hapus sesi
session_destroy();
 
// Otw ke login dengan alert logout
header("location: login_review.php?alert=logout");
exit;
?>