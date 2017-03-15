<html>
<body>
<?php
$host="http://mybookapplication.azurewebsites.net"
$db='book1';
$pwd="e924a34e";
$user="b399ff00c924be";

//$con = mysql_connect('localhost',$username,$password) or die("Unable to log into database");
//@mysql_select_db($database,$con) or die("Unable to connect");
 $conn = new mysqli($host, $user, $pwd, $db);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


//phpinfo();
  // try {
  //     $conn = new PDO( "mysql:host=$host;dbname=$db", $user, $pwd);
  //     $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
  //      //PDOStatement::errorInfo();
  //  }
  //  catch(Exception $e){
  //      die(var_dump($e));
  //  }
  // $connectionOptions = array(
	 // "Database" => "catofbooks",
  // 	 "Uid" => "b5fc840de6873a",
  // 	 "PWD" => "2ab7a8e4");
  // $conn = sqlsrv_connect($host, $connectionOptions);
//if($conn){ echo "Connected!";}

if(!empty($_POST['cat'])){
	$inputcat = $_POST['cat'];
	$query = "SELECT * FROM details WHERE Category='$inputcat'";
	echo mysqli_errno();

	$result = mysqli_query($conn,$query) or die(mysqli_errno());

	if($row = mysqli_fetch_array($result) == FALSE){echo "False";}
	else{
		error_reporting(0);
		echo "Books Found<br><br>";
		error_reporting(0);
		while($row = mysqli_fetch_array($result)){
		 	echo $row["Bname"] ."<br> Price: ".$row["Price"]."<br> Copies: ". $row["Copies"]."<br>  Rating: ".$row["Rating"];?><form method="POST"><button formaction="purchase.php" type="submit" value = "<?php echo $row["Bname"] ?>" name = "Bname">Buy Book</button></form><br><br>
	<?php
	}
	?>
	<br><form><button formaction="Client.php" type="submit">HOME</button></form></br>
	<?php
 }
}

if(!empty($_POST['booksearch'])){
	$inputbkname = $_POST['booksearch'];
	$query = "SELECT * FROM details WHERE Bname='$inputbkname'";
	echo mysqli_errno();

	$result = mysqli_query($conn,$query) or die(mysqli_errno());

	// if($row = mysql_fetch_array($result) == FALSE){echo "False";}
	// else{
		// echo "Books Found<br><br>";
		$row = mysqli_fetch_array($result);
		//<!-- echo $row["Bname"] ."  "."<br><br>"; -->
		 	echo $row["Bname"] ."<br> Price: ".$row["Price"]."<br> Copies: ". $row["Copies"]."<br>  Rating: ".$row["Rating"];?><form method="POST"><button formaction="purchase.php" type="submit" value = "<?php echo $row["Bname"] ?>" name = "Bname">Buy Book</button></form><br><br>
	<br><form><button formaction="Client.php" type="submit">HOME</button></form></br>
	<?php
 }
//echo $result;

//}
mysqli_close($mysqli);

?>

</body>
</html>
