<?php

$database="book1";
$password="";
$username="root";

$con = mysql_connect('localhost',$username,$password) or die("Unable to log into database");
@mysql_select_db($database,$con) or die("Unable to connect");

if(!empty($_POST['Bnam']) && !empty($_POST['Anam']) && !empty($_POST['Pric'])){
$inputbname = $_POST['Bnam'];
$inputAname = $_POST['Anam'];
$inputPrice = $_POST['Pric'];
$inputFormat = $_POST['Frm'];
$inputCopies = $_POST['Copie'];
$inputCategory = $_POST['Categor'];
$inputRating = $_POST['Ratin'];

$query = "INSERT INTO details VALUES ('$inputbname','$inputAname','$inputPrice','$inputFormat','$inputCopies','$inputCategory','$inputRating')";

echo mysql_error();
$result = mysql_query($query) or die(mysql_error());

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
mysql_query($query) or die(mysql_error());
echo "Book price has been successfully updated";?>
<br><form><button formaction="Seller.html" type="submit">HOME</button></form></br>
<?php
}

mysql_close();
?>