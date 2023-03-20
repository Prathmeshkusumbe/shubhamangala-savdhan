<?php 

if (isset($_COOKIE['admin'])) {
	setcookie("admin", "", time() - 3600);		
}
?>
logged out
<a href="admin-login.php">login</a>