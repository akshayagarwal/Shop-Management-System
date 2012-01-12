<?php
include "dbinst.php";
$id=$_GET['id'];
$query="SELECT NAME from brands WHERE id='$id'";
$result=mysql_query($query);

list($brand)=mysql_fetch_row($result);
mysql_close();
echo "<form action='remove_brand_p.php' method='post'>";
echo "<font color='red'><h1>Deleting this brand will REMOVE ALL MOBILES of this brand!!! Are you sure you want to delete ".$brand." ???";
echo "<div style='display:none;'>";
echo "<input type='text' name='id' value='".$id."'>";
echo "</div>";
echo "<input type='button' name='no' value='No'>&nbsp<input type='submit' name='submit' value='Yes!!'>";
echo "</form>";
?>