<?php

$userreg=$_POST['user'];
$passreg=$_POST['pass'];

//Create few varaibles
$taken="false";
$database="tutorial";
$password="root";
$username="root";

//main if statement
if($userreg&&$passreg){
	//Connect to database
	$con = myseql_connect('localhost',$username,$password) or die("Unable to log into database");
	@mysql_select_db($database,$con) or die("Unable to connect");
mysql_query("INSERT INTO 'users' VALUES('','$userreg','$passreg')") or die("Strange error");
echo "Account Created";

mysql_close($con);

header("Location:hello.html");
}
else{
	echo "You Need to have both username and password";
}

?>