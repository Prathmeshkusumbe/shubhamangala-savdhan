<?php
if(isset($_COOKIE['admin'])){
	header('location:admin.php');die();
}

require("../connection.php");
require("functions.php");
$msg = "";
if(isset($_POST["submit"])){
	$msg = "";
	$username = $_POST["username"];
	$password = $_POST["password"];
	
	$query = array('email'=>$username, 'password'=> $password);

	//$obj = new db();
	$test = $db->get('users', $query);
	//ap($test);

	
	if($test['no-of-rows'] > 0 ){
		
		//$_SESSION['admin'] = "yes";
		setcookie ("admin",'admin',time()+ (10 * 365 * 24 * 60 * 60));
		header('location:admin.php');
		die();
	}
	else{
		$msg = "Please enter corrent login details.";
	}
}
?>
<html>
<head>
	<title>log in</title>
	<link rel="stylesheet" href="../layout.css">
	<link rel="stylesheet" href="style.css">
</head>
<body class="admin-login">
<div class="login">
	<form method="post">
		<div class=field>
			<label>Username or Email address</label>
			<input name="username" type="text" class="username" placeholder="username" required>
		</div>
		<div class=field>
			<label>Password</label>
			<input name="password" type="password" class="password" placeholder="password" required>
		</div>
		<div class="submit text-align-right blue-border-color">	
			<input name="submit" type="submit" class="admin-blue-bg" value="login">
		</div>
	</form>
	<div class="forgot-password"><a href="">forgot password </a><a class="home-url float-right" href="<?php echo SITE_URL;?>">home url</a></div>
	<div class="login-failed red"><?php echo $msg; ?></div>
</div>
</body>
</html>