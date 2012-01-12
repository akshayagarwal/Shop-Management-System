<?php
 include "dbinst.php";
 $offer=$_POST['offer'];

 
 $query="UPDATE homepage SET offer='$offer' WHERE HID=1";
 $result=mysql_query($query) or die("Could't Update , Kindly Try Again!");
 mysql_close();
 if($result)
 {
	echo "Offer Updated Successfully!";
 }
 ?>
 