<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
	<title>View Latest Mobiles | Agrawal Brothers</title>
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
				<i>Latest Mobiles</i>
			</div>	
			
			<h1>The following are the latest mobiles</h1>

			<div id="demo">
<table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
	<thead>
		<tr>
			<th>S.No.</th>
			<th>Brand</th>
			<th>Model</th>
			<th>Update</th>
		</tr>

	</thead>
	<tbody>
		<?php
		include "dbinst.php";
		$query="SELECT latest_mob_id,mob_id FROM latestmob";
		$results=mysql_query($query);
		while(list($latid,$mobid)=mysql_fetch_row($results))
		{
			$query2="SELECT brand,model FROM mobiles WHERE ID='$mobid'";
			$result2=mysql_query($query2);
			list($brand,$model)=mysql_fetch_row($result2);
				echo "<tr>";
					echo "<td>$latid</td>";
					echo "<td>$brand</td>";
					echo "<td>$model</td>";
					echo "<td><a href='update_latest_mobile_p.php?mobid=".$mobid."&latid=".$latid."'><u>Update</u>";
				echo "</tr>";
			
		}
		mysql_close();
		?>
	
	</tbody>
	<tfoot>

		<tr>
			<th>S.No.</th>
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