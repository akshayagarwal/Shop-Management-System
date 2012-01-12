<?php
include "dbinst.php";
$bname=$_POST['bname'];

$query="INSERT INTO brands SET NAME='$bname'";
$results=mysql_query($query);

if($results)
{
    echo "<b>New Brand Added Successfully!";
}
else
{
    echo "Error in adding new brand! Kindly Refresh or try again!";
}
mysql_close();
?>