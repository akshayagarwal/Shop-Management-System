<?php

$latid=$_GET['latid'];

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
	<title>Select Latest Mobile | Agrawal Brothers</title>
	<style type="text/css" title="currentStyle">
			@import "media/css/demo_page.css";
			@import "media/css/demo_table.css";
			@import "examples_support/themes/smoothness/jquery-ui-1.7.2.custom.css";

	</style>

	<script type="text/javascript" language="javascript" src="media/js/jquery.js"></script>
	<script type="text/javascript" language="javascript" src="media/js/jquery.dataTables.js"></script>
		<script type="text/javascript" charset="utf-8">
			var oTable;
			
			$(document).ready(function() {	
				oTable = $('#example').dataTable();
			} );
		</script>
</head>

	<body id="dt_example">
		  	
		<div id="container">
			<div class="full_width big">
				<i>Mobiles</i>
			</div>	
			
			<h1>Select a mobile from below</h1>

			<div id="demo">
<table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
	<thead>
		<tr>
			
			<th>Brand</th>
			<th>Model</th>
			<th>Price</th>
			<th>Select</th>
		</tr>

	</thead>
	<tbody>
		<?php
		include "dbinst.php";
		$query="SELECT id,brand,model,price FROM mobiles ORDER BY brand";
		$results=mysql_query($query);
		while(list($id,$brand,$model,$price)=mysql_fetch_row($results))
		{
				echo "<tr>";
					echo "<td>$brand</td>";
					echo "<td>$model</td>";
					echo "<td>$price</td>";
					echo "<td><a href='update_latest_mobile_pop.php?mobid=".$id."&latid=".$latid."'><u>Select</u>";
				echo "</tr>";
			
		}
		mysql_close();
		?>
	
	</tbody>
	<tfoot>

		<tr>
			<th>Brand</th>
			<th>Model</th>
			<th>Price</th>
			<th>Select</th>
			
		</tr>
	</tfoot>
</table>

			</div>
			<div class="spacer"></div>
			
			
</div>
	
	
		
	</body>
</html>
