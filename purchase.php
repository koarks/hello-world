<html>
<?php

$inputbook = $_POST['Bname'];
$host="http://mybookapplication.azurewebsites.net"
$db='book1';
$pwd="e924a34e";
$user="b399ff00c924be";


//echo "$inputbook";

 $conn = new mysqli($host, $user, $pwd, $db);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

//echo "$inputbook";

// $con = mysql_connect('localhost',$username,$password) or die("Unable to log into database");
// @mysql_select_db($database,$con) or die("Unable to connect");

$query = "UPDATE details SET Copies=Copies-1 WHERE bname='$inputbook' AND Copies>0";
$result = mysqli_query($conn,$query) or die(mysqli_errno());
if($result==TRUE){
	//$row = mysql_fetch_array($result);
	//echo "$row['Bname']";
	echo "YOUR PURCHASE IS SUCCESSFUL! TRANSACTION COMPLETED<br>";?>
	<br><form><button formaction="Client.html" type="submit">Continue Shopping</button></form></br>

	<?php 
	$query = "DELETE FROM details WHERE Bname = '$inputbook' AND Copies=0";
	//echo mysql_query($query) or die(mysql_error()." if");
 }

else{
	$query = "DELETE FROM details WHERE Bname = '$inputbook' AND Copies=0";
	echo mysqli_query($conn,$query) or die(mysqli_errno())."else";
}

mysqli_close($conn);

?>
</html>
