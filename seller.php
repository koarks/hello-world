<?php


$host="http://mybookapplication.azurewebsites.net"
$db='book1';
$pwd="e924a34e";
$user="b399ff00c924be";


 $conn = new mysqli($host, $user, $pwd, $db);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

 // try {
 //     $conn = new PDO( "mysql:host=$host;dbname=$db", $user, $pwd);
 //     $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
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


if(!empty($_POST['Bnam']) && !empty($_POST['Anam']) && !empty($_POST['Pric'])){
$inputbname = $_POST['Bnam'];
$inputAname = $_POST['Anam'];
$inputPrice = $_POST['Pric'];
$inputFormat = $_POST['Frm'];
$inputCopies = $_POST['Copie'];
$inputCategory = $_POST['Categor'];
$inputRating = $_POST['Ratin'];

$query = "INSERT INTO details VALUES ('$inputbname','$inputAname','$inputPrice','$inputFormat','$inputCopies','$inputCategory','$inputRating')";

echo mysqli_errno();
$result = mysqli_query($conn,$query) or die(mysqli_errno());

if($result == FALSE){echo "False";}
else{
	//$result = mysql_query($query);
	//$row = mysql_fetch_array($result);

	echo "You have added the book successfully<br>";?>
	<br><form><button formaction="Seller.html" type="submit">HOME</button></form></br>
<?php
  }
}

if(!empty($_POST['bkname']) && !empty($_POST['newprice'])){
	$bookname = $_POST['bkname'];
$new_price = $_POST['newprice'];
$query="UPDATE details SET Price='$new_price' WHERE bname='$bookname'";
mysqli_query($conn,$query) or die(mysqli_errno());
echo "Book price has been successfully updated";?>
<br><form><button formaction="Seller.html" type="submit">HOME</button></form></br>
<?php
}

mysqli_close($conn);
?>
