<?php
 include "dbinst.php";
 $mobid=$_GET['id'];
 
 $query="SELECT brand,model FROM mobiles WHERE id='$mobid'";
 $result=mysql_query($query);
 list($brand,$model)=mysql_fetch_row($result);
 ?>
 
 <html>
	<body>
		<form action="remove_mobile_p.php" method="post">
		<font color="red"><h1>WARNING!! Are you sure you want to delete <?php echo $brand." ".$model;?> ?</h1></font>
		<div style="display:none;">
		<input type="text" name="mobid" value="<?php echo $mobid; ?>">
		</div>
		<input type=button name="no" value="No">&nbsp&nbsp<input type="submit" name="submit" value="Yes!">
		</form>
	</body>
 </html>