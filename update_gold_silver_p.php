<?php
 include "dbinst.php";
 $gold=$_POST['gold'];
 $silver=$_POST['silver'];
 
 $query="UPDATE homepage SET GOLD='$gold' , SILVER='$silver' WHERE HID=1";
 $result=mysql_query($query) or die("Could't Update , Kindly Try Again!");
 mysql_close();
 if($result)
 {
	echo "Rates Updated Successfully!";
 }
 ?>
 
 