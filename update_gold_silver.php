<?php
include "dbinst.php";

$query="SELECT gold,silver FROM homepage WHERE HID=1";
$result=mysql_query($query);
list($gold,$silver)=mysql_fetch_row($result);
mysql_close();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<title>Update Gold/Silver Rates | Agrawal Brothers Pvt. Ltd.</title>

<link rel="stylesheet" type="text/css" media="screen" href="milk.css" />
<link rel="stylesheet" type="text/css" media="screen" href="../css/chili.css" />

<script src="../../lib/jquery.js" type="text/javascript"></script>
<script src="../../jquery.validate.js" type="text/javascript"></script>

<style type="text/css">
	pre { text-align: left; }
</style>

<script id="demo" type="text/javascript">
$(document).ready(function() {
	// validate signup form on keyup and submit
	var validator = $("#signupform").validate({
		rules: {
			
			gold: {
				required: true,
				digits:true;
			},
			silver: {
				required: true,
				digits:true;
			},
                        model: {
				required: true,
			},
                        btalktime: {
				required: true,
                                digits: true;
			},
                        bstandby: {
				required: true,
                                digits: true;
			},
                        price:{
                            required: true;
                            digits: true;
                        },
			username: {
				required: true,
				minlength: 2,
				remote: "users.php"
			},
			password: {
				required: true,
				minlength: 5
			},
			password_confirm: {
				required: true,
				minlength: 5,
				equalTo: "#password"
			},
			email: {
				required: true,
				email: true,
				remote: "emails.php"
			},
			dateformat: "required",
			terms: "required"
		},
		messages: {
			gold: {
                            required: "Please enter the gold rates!",
			    digits:"Must be in digits!",
                        },
			silver: {
                            required: "Please enter the silver rates!",
			    digits:"Must be in digits!",
                        },
                        model: {
                            required: "Please enter the mobile model!",
                        },
                        bstandby: {
                            required: "Please enter the battery standby time!",
                            digits: "Must be in digits",
                        },
                        btalktime: {
                            required: "Please enter the battery talktime!",
                            digits: "Must be in digits",
                        },
                        price: {
                            required: "Please enter the mobile price",
                            digits: "Must be in digits",
                        },
			username: {
				required: "Enter a username",
				minlength: jQuery.format("Enter at least {0} characters"),
				remote: jQuery.format("{0} is already in use")
			},
			password: {
				required: "Provide a password",
				rangelength: jQuery.format("Enter at least {0} characters")
			},
			password_confirm: {
				required: "Repeat your password",
				minlength: jQuery.format("Enter at least {0} characters"),
				equalTo: "Enter the same password as above"
			},
			email: {
				required: "Please enter a valid email address",
				minlength: "Please enter a valid email address",
				remote: jQuery.format("{0} is already in use")
			},
			dateformat: "Choose your preferred dateformat",
			terms: " "
		},
		// the errorPlacement has to take the table layout into account
		errorPlacement: function(error, element) {
			if ( element.is(":radio") )
				error.appendTo( element.parent().next().next() );
			else if ( element.is(":checkbox") )
				error.appendTo ( element.next() );
			else
				error.appendTo( element.parent().next() );
		},
		// specifying a submitHandler prevents the default submit, good for the demo
		submitHandler: function() {
			document.forms["signupform"].submit();

		},
		// set this class to error-labels to indicate valid fields
		success: function(label) {
			// set &nbsp; as text for IE
			label.html("&nbsp;").addClass("checked");
		}
	});
	
	// propose username by combining first- and lastname
	$("#username").focus(function() {
		var firstname = $("#firstname").val();
		if(firstname && !this.value) {
			this.value = firstname;
		}
	});

});
</script>

</head>
<body>

<h1>Update Gold/Silver Rates</h1>
<div id="main">

<div id="content">

<div id="header">
</div>
<div style="clear: both;"><div></div></div>


<div class="content">
    <div id="signupbox">
       <div id="signuptab">
        <ul>
          <li id="signupcurrent"><a href=" ">Update Gold/Silver Rates</a></li>
        </ul>
      </div>
      <div id="signupwrap">
      		<form id="signupform" autocomplete="on" method="post" action="update_gold_silver_p.php">
	  		  <table>
				<tr>
	  		  	<td class="label"><label for="gold">Gold</label></td>
	  		  	<td class="field"><input id="gold" name="gold" type="text" value="<?php echo $gold; ?>" title="Enter Gold Rate"/>Rupees/10gm</td>
	  		  	<td class="status"></td>
	  		  </tr>
				
				<tr>
	  		  	<td class="label"><label for="silver">Silver</label></td>
	  		  	<td class="field"><input id="silver" name="silver" type="text" value="<?php echo $silver; ?>" title="Enter Silver Rate"/>Rupees/10gm</td>
	  		  	<td class="status"></td>
	  		        </tr>
				
				
			 <tr>
	  			<td class="label"><label id="lsignupsubmit" for="signupsubmit">Update</label></td>
	  			<td class="field" colspan="2">
	                        <input id="signupsubmit" name="signup" type="submit" value="Update" />
	  			</td>
	  		  </tr>
                          
                        </table>
                    </form>
                </div>
      </div>
    </div>
  </div>
 </div>
</body>

</html>
