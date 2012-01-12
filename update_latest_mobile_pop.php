<?php
 include "dbinst.php";
 $latid=$_GET['latid'];
 $mobid=$_GET['mobid'];
 
 $query="UPDATE latestmob SET mob_id='$mobid' WHERE latest_mob_id='$latid'";
 $result=mysql_query($query) or die("Couldn't Update Mobile , Kindly Try Again");
 
 if($result)
 {
	echo "Latest Mobile Updated Successfully!";
	echo "\n<br><a href='view_latest_mobiles.php'>Click Here To Continue</a>";
 }
 mysql_close();
 ?>
 