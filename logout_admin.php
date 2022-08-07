<?php
// Int Sesi
session_start();
$_SESSION = array();
 
// Hapus sesi
session_destroy();
 
// Otw ke login dengan alert logout
header("location: login_admin.php?alert=logout");
exit;
?>