<?php
 include "dbinst.php";
 
 $query="SELECT mob_id FROM latestmob";
 $result=mysql_query($query) or die("Could not connect to database , Kindly Refresh the Page");
 
 while(list($mobid)=mysql_fetch_row($result))
 {
        echo $mobid;
	$query2="SELECT BRAND,MODEL,PHOTOID FROM mobiles WHERE ID='$mobid'";
	$result2=mysql_query($query2);
	list($brand,$model,$photoid)=mysql_fetch_row($result2);

	echo "<li>";
	echo "<a href='detail.html?id=".$mobid."'>";
	echo "<img src='final_retrieve.php?photoid=".$photoid."' alt='Image Not Found'>";
	echo "</a>";
	echo "<h6 class='colr'>".$brand." ".$model."</h6>";
	echo "</li>";
	
 }
 ?>