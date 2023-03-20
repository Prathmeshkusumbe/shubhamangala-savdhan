<?php
require("functions.php");
if(!is_admin()) {die();}
require("../connection.php");

?>

<html>
<head>
	<link rel="stylesheet" href="../layout.css">
	<link rel="stylesheet" href="style.css">
</head>
<body class=admin>
<div class="admin-header">
<div class="admin-top-bar">
	<div class="left">
		<div><a target="_blank" href="<?php echo SITE_URL ?>">Dashboard</a></div>
	</div><div class="right text-align-right">
		<div class="user">
			<a href="logout.php"> Log out </a>
		</div>
	</div>
</div>
</div>
<div class="left-dashboard">
	<ul>
		<li>
		<a href="users.php">users</a>
		</li>
	</ul>
</div>
