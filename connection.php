<?php  	
session_start();
//$con = mysqli_connect("localhost","root","","shubhmanagal-savadhan"); 



define('SERVER_PATH', $_SERVER['DOCUMENT_ROOT'].'/shubhmanagal-savadhan');
define('SITE_URL', 'http://localhost/shubhmanagal-savadhan');


$dbhost = 'localhost';
$dbuser = 'root';
$dbpassword = '';
$dbname = 'shubhmanagal-savadhan';

require("includes/db.php");

require('includes/error-handler.php');

$error = error_get_last();

echo "<pre>"; print_r($error);

fdsafd();

?>