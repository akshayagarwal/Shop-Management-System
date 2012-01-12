<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
	<title>View Brands | Agrawal Brothers</title>
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
				<i>Brands</i>
			</div>	
			
			<h1>The following brands are available</h1>

			<div id="demo">
<table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
	<thead>
		<tr>
			
			<th>Brand</th>
			<th>Mobiles</th>
			<th>Remove</th>
		</tr>

	</thead>
	<tbody>
		<?php
		include "dbinst.php";
		$query="SELECT id,name FROM brands";
		$results=mysql_query($query);
		while(list($id,$name)=mysql_fetch_row($results))
		{
			$query2="SELECT COUNT(model) FROM mobiles WHERE brand='$name'";
			$results2=mysql_query($query2);
			list($mobcount)=mysql_fetch_row($results2);
			
				echo "<tr>";
					echo "<td>$name</td>";
					echo "<td>$mobcount</td>";
					echo "<td><a href='remove_brand.php?id=".$id."'><font color='red'><u>Remove</u>";
				echo "</tr>";
			
		}
		mysql_close();
		?>
	
	</tbody>
	<tfoot>

		<tr>
			<th>Brand</th>
			<th>Mobiles</th>
			<th>Remove</th>
			
		</tr>
	</tfoot>
</table>

			</div>
			<div class="spacer"></div>
			
			
</div>
	
	
		
	</body>
</html>