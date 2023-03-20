<?php
function get_safe_value($con, $str){
	if($str!=''){
		$str = trim($str);
		return mysqli_real_escape_string($con, $str);	
	}
} 

function ap($value)
{
	echo '<pre>';
	print_r($value);
}
function is_admin(){
	if(isset($_COOKIE['admin']))
	return true;
	else return false;
}