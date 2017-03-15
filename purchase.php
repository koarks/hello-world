<html>
<?php

$inputbook = $_POST['Bname'];
$host="http://mybookapplication.azurewebsites.net"
$db='book1';
$pwd="e924a34e";
$user="b399ff00c924be";



 $conn = new mysqli($host, $user, $pwd, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


$query = "UPDATE details SET Copies=Copies-1 WHERE bname='$inputbook' AND Copies>0";
$result = mysqli_query($conn,$query) or die(mysqli_errno());
if($result==TRUE){
	echo "YOUR PURCHASE IS SUCCESSFUL! TRANSACTION COMPLETED<br>";?>
	<br><form><button formaction="Client.html" type="submit">Continue Shopping</button></form></br>

	<?php 
	$query = "DELETE FROM details WHERE Bname = '$inputbook' AND Copies=0";
 }

else{
	$query = "DELETE FROM details WHERE Bname = '$inputbook' AND Copies=0";
	echo mysqli_query($conn,$query) or die(mysqli_errno())."else";
}

mysqli_close($conn);

?>
</html>
