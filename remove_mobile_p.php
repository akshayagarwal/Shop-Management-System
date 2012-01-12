<?php
 
 include "dbinst.php";
 
 if(isset($_POST['submit']))
 {
    $mobid=$_POST['mobid'];
    
    /****** Check & remove from latest ********/
    $query="UPDATE latestmob SET mobid='NULL' WHERE mobid='$mobid'";
    $result=mysql_query($query);
    
    $query="SELECT * FROM mobiles";
    $result=mysql_query($query);
    
    /*****Remove Photo******/
    $query="SELECT PHOTOID FROM mobiles WHERE ID='$mobid'";
    $result=mysql_query($query);
    list($photoid)=mysql_fetch_row($result);
    $query="DELETE FROM upload WHERE ID='$photoid'";
    $result=mysql_query($query);
    
    /****Remove mobile***/
    $query="DELETE FROM mobiles WHERE ID='$mobid'";
    $result=mysql_query($query) or die("Couldn't delete mobile , Kindly Try Again!");
    
    if($result)
    {
	echo "Mobile Deleted Successfully!";
    }
    
 }
 
 else
 {
    echo "<a href='view_edit_mobile.php'>Click Here to Go to View/Edit Mobiles</a>";
 }
 
 ?>
    
    