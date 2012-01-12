<?php
include "dbinst.php";
 $id=$_POST['id'];
 
 $query="SELECT name FROM brands WHERE id='$id'";
 $result=mysql_query($query);
 
 list($brand)=mysql_fetch_row($result);
 
 $query="SELECT id,photoid FROM mobiles WHERE brand='$brand'";
 $result=mysql_query($query);
 
 while(list($mobid,$photoid)=mysql_fetch_row($result))
 {
	/*---Remove Photo---*/
	$query2="DELETE FROM upload WHERE ID='$photoid'";
	$result2=mysql_query($query2);
	
	/*----Remove Mobile---*/
	$query3="DELETE FROM mobiles WHERE ID='$mobid'";
	$result3=mysql_query($query3);
 }
 
 $query="DELETE FROM brands WHERE ID='$id'";
 $result=mysql_query($query) or die("Couldn't delete brand! Kindly Contact Akshay");
 
 if($result)
 {
	echo "Brand Deleted Successfully!!";
 }
 
 mysql_close();
 ?>
 
