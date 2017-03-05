<html>
<body>
<?php

$database='book1';
$password="";
$username="root";

$con = mysql_connect('localhost',$username,$password) or die("Unable to log into database");
@mysql_select_db($database,$con) or die("Unable to connect");

if(!empty($_POST['cat'])){
	$inputcat = $_POST['cat'];
	$query = "SELECT * FROM details WHERE Category='$inputcat'";
	echo mysql_error();

	$result = mysql_query($query) or die(mysql_error());

	if($row = mysql_fetch_array($result) == FALSE){echo "False";}
	else{
		//$result = mysql_query($query);
		echo "Books Found<br><br>";
		while($row = mysql_fetch_array($result)){
		//<!-- echo $row["Bname"] ."  "."<br><br>"; -->
		 	echo $row["Bname"] ."<br> Price: ".$row["Price"]."<br> Copies: ". $row["Copies"]."<br>  Rating: ".$row["Rating"];?><form method="POST"><button formaction="purchase.php" type="submit" value = "<?php echo $row["Bname"] ?>" name = "Bname">Buy Book</button></form><br><br>
	<?php
	}
 }
}

if(!empty($_POST['booksearch'])){
	$inputbkname = $_POST['booksearch'];
	$query = "SELECT * FROM details WHERE Bname='$inputbkname'";
	echo mysql_error();

	$result = mysql_query($query) or die(mysql_error());

	// if($row = mysql_fetch_array($result) == FALSE){echo "False";}
	// else{
		// echo "Books Found<br><br>";
		$row = mysql_fetch_array($result);
		//<!-- echo $row["Bname"] ."  "."<br><br>"; -->
		 	echo $row["Bname"] ."<br> Price: ".$row["Price"]."<br> Copies: ". $row["Copies"]."<br>  Rating: ".$row["Rating"];?><form method="POST"><button formaction="purchase.php" type="submit" value = "<?php echo $row["Bname"] ?>" name = "Bname">Buy Book</button></form><br><br>
	<?php
 }
//echo $result;

//}
mysql_close();

?>

</body>
</html>