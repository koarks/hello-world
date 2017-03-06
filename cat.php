<html>
<body>
<?php
$host="http://mybookapplication.azurewebsites.net"
$database='book1';
$password="e924a34e";
$username="b399ff00c924be";

//$con = mysql_connect('localhost',$username,$password) or die("Unable to log into database");
//@mysql_select_db($database,$con) or die("Unable to connect");
try {
     $conn = new PDO( "mysql:host=$host;database=$db", $username, $password);
      $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
       //PDOStatement::errorInfo();
   }
   catch(Exception $e){
       die(var_dump($e));
   }
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
