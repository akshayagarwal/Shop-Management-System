<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<title>Add New Mobile | Agrawal Brothers Pvt. Ltd.</title>

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
			
			brand: {
				required: true,
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
			brand: {
                            required: "Please enter the mobile brand!",
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

<h1>Add A New Mobile</h1>
<div id="main">

<div id="content">

<div id="header">
</div>
<div style="clear: both;"><div></div></div>


<div class="content">
    <div id="signupbox">
       <div id="signuptab">
        <ul>
          <li id="signupcurrent"><a href=" ">Enter Mobile Details</a></li>
        </ul>
      </div>
      <div id="signupwrap">
      		<form id="signupform" autocomplete="on" method="post" action="add_new_mobile_p.php" enctype="multipart/form-data">
	  		  <table>
				<tr>
				<td class="label"><label for="brand">Brand</label></td>
				<td class="field">
                                    <?php
					function create_dropdown($identifier,$pairs,$first)
					   {
					      $dropdown="<select name=\"$identifier\"> ";
					       $dropdown.="<option>$first</option>";
						
						foreach($pairs AS $value => $name)
						{
						   $dropdown.="<option>$name</option>";
						}
						
						//echo "</select>";
					      return $dropdown;
					   }
					   include "dbinst.php";
					   $query="SELECT ID,NAME FROM brands ORDER BY NAME";
					   $results=mysql_query($query);
					   while($row = mysql_fetch_array($results))
					   {
					   $value = $row["ID"];
					   $name = $row["NAME"];
					   $pairs["$value"] = $name;
					   }
					   echo create_dropdown("bname",$pairs,"Select Brand");
					   mysql_close();
					   ?>
                                </td>
				<td class="status"></td>
			  </tr>
				
                          <tr>
	  		  	<td class="label"><label for="model">Model</label></td>
	  		  	<td class="field"><input id="model" name="model" type="text" value="" title="Enter the mobile model"/></td>
	  		  	<td class="status"></td>
	  		  </tr>
                          
                          <tr>
	  			<td class="label"><label for="network">Network</label></td>
	  			<td class="field">
				<input type="radio" id="network" name="network" value="GSM" checked="checked"/>GSM
				<input type="radio" name="network" value="CDMA"/>CDMA
				</td>
	  			<td class="status"></td>
	  		  </tr>
                          
                          <tr>
	  			<td class="label"><label for="dualsim">Dual SIM</label></td>
	  			<td class="field">
				<input type="radio" id="dualsim" name="dualsim" value="Yes"/>Yes 
				<input type="radio" name="dualsim" value="No" checked="checked"/>No
				</td>
	  			<td class="status"></td>
	  		  </tr>
                          
			  <tr>
	  			<td class="label"><label for="touchscreen">Touchscreen</label></td>
	  			<td class="field">
				<input type="radio" id="touchscreen" name="touchscreen" value="Yes"/>Yes 
				<input type="radio" name="touchscreen" value="No" checked="checked"/>No
				</td>
	  			<td class="status"></td>
	  		  </tr>
			  
                          <tr>
	  			<td class="label"><label for="fm">FM</label></td>
	  			<td class="field">
				<input type="radio" id="fm" name="fm" value="Yes" checked="checked"/>Yes 
				<input type="radio" name="fm" value="No"/>No
				</td>
	  			<td class="status"></td>
	  		  </tr>
                          
                          <tr>
	  			<td class="label"><label for="mp3">MP3</label></td>
	  			<td class="field">
				<input type="radio" id="mp3" name="mp3" value="Yes" checked="checked"/>Yes 
				<input type="radio" name="mp3" value="No"/>No
				</td>
	  			<td class="status"></td>
	  		  </tr>
                          
                          <tr>
	  			<td class="label"><label for="video">Video</label></td>
	  			<td class="field">
				<input type="radio" id="video" name="video" value="Yes" checked="checked"/>Yes 
				<input type="radio" name="video" value="No"/>No
				</td>
	  			<td class="status"></td>
	  		  </tr>
                          
                          <tr>
	  			<td class="label"><label for="camera">Camera</label></td>
	  			<td class="field">
				<input type="radio" id="camera" name="camera" value="Yes" checked="checked"/>Yes 
				<input type="radio" name="camera" value="No"/>No
				</td>
	  			<td class="status"></td>
	  		  </tr>
                          
                          <tr>
	  			<td class="label"><label for="internet">Internet</label></td>
	  			<td class="field">
				<input type="radio" id="internet" name="internet" value="Yes" checked="checked"/>Yes 
				<input type="radio" name="internet" value="No"/>No
				</td>
	  			<td class="status"></td>
	  		  </tr>
                          
                          <tr>
	  			<td class="label"><label for="threeg">3G</label></td>
	  			<td class="field">
				<input type="radio" id="threeg" name="threeg" value="Yes"/>Yes 
				<input type="radio" name="threeg" value="No" checked="checked"/>No
				</td>
	  			<td class="status"></td>
	  		  </tr>
			  
			   <tr>
	  			<td class="label"><label for="wifi">Wi-Fi</label></td>
	  			<td class="field">
				<input type="radio" id="wifi" name="wifi" value="Yes"/>Yes 
				<input type="radio" name="wifi" value="No" checked="checked"/>No
				</td>
	  			<td class="status"></td>
	  		  </tr>
			   
			   <tr>
	  			<td class="label"><label for="phonebook_memory">Phonebook Memory</label></td>
	  			<td class="field">
				<input type="text" id="phonebook_memory" name="phonebook_memory"/>Entries
				</td>
	  			<td class="status"></td>
	  		  </tr>
			   
			   <tr>
	  			<td class="label"><label for="sms_memory">SMS Memory</label></td>
	  			<td class="field">
				<input type="text" id="sms_memory" name="sms_memory"/>Messages
				</td>
	  			<td class="status"></td>
	  		  </tr>
                          
                          <tr>
	  			<td class="label"><label for="bluetooth">Bluetooth</label></td>
	  			<td class="field">
				<input type="radio" id="bluetooth" name="bluetooth" value="Yes" checked="checked"/>Yes 
				<input type="radio" name="bluetooth" value="No"/>No
				</td>
	  			<td class="status"></td>
	  		  </tr>

                          <tr>
	  			<td class="label"><label for="btalktime">Battery Talktime</label></td>
	  			<td class="field">
				<input type="text" id="btalktime" name="btalktime" value="" title="Enter the Battery Talktime in Hours"/>Hours
				</td>
	  			<td class="status"></td>
	  		  </tr>
                          
                          <tr>
	  			<td class="label"><label for="bstandby">Battery Standby</label></td>
	  			<td class="field">
				<input type="text" id="bstandby" name="bstandby" value="" title="Enter the Battery Standby Time in Days"/>Days
				</td>
	  			<td class="status"></td>
	  		  </tr>
                          
                          <tr>
	  			<td class="label"><label for="price">Price</label></td>
	  			<td class="field">
				<input type="text" id="price" name="price" value="" title="Enter the price of the mobile"/>Rupees
				</td>
	  			<td class="status"></td>
	  		  </tr>
                          
                          <tr>
	  			<td class="label"><label for="special">Special Features</label></td>
	  			<td class="field">
				<textarea name="special" id="special"></textarea>
				</td>
	  			<td class="status"></td>
	  		  </tr>
			  
			  <tr>
	  			<td class="label"><label for="colors">Colors Available</label></td>
	  			<td class="field">
				<textarea name="colors" id="colors"></textarea>
				</td>
	  			<td class="status"></td>
	  		  </tr>
                          
			  <tr>
	  			<td class="label"><label for="image">Image</label></td>
	  			<td class="field">
				<input type="hidden" name="MAX_FILE_SIZE" value="2000000">
                                <input name="userfile" type="file" id="userfile"> 
				</td>
	  			<td class="status"></td>
	  		  </tr>
			  
				
                          <tr>
	  			<td class="label"><label id="lsignupsubmit" for="signupsubmit">Add</label></td>
	  			<td class="field" colspan="2">
	                        <input id="signupsubmit" name="signup" type="submit" value="Add" />
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

                                      
                          