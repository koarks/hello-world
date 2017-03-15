<?php


$host="http://mybookapplication.azurewebsites.net"
$db='book1';
$pwd="e924a34e";
$user="b399ff00c924be";


 $conn = new mysqli($host, $user, $pwd, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

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
