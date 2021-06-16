<?php
session_start();
unset($_SESSION['login']); 
?>
<?php
$redirect_page='Location: login.php';
header($redirect_page);
?>