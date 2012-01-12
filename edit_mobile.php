<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
   <script type="text/javascript">  
      
    function toggleElement(sel1, element1) {  
      
      if (sel1.checked) {  
      
        element1.style.display = 'inline';  
     
     }  
     else {  
       element1.value = ''; // input text will be empty  
       element1.style.display = 'none'; // hide text element  
     }  
  
     return;  
   }  
   </script>
   

<?php
 include "dbinst.php";
 /*-----------Gather Mobile Details-----------------------------*/
 $id=$_GET['id'];
 $query="SELECT * FROM mobiles WHERE id='$id'";
 $result=mysql_query($query);
 list($mobid,$brand,$model,$network,$dualsim,$touchscreen,$fm,$mp3,$video,$camera,$internet,$threeg,$bluetooth,$btalktime,$bstandby,$price,$special,$colors,$sname,$photoid,$phonebook_memory,$sms_memory,$wifi)=mysql_fetch_row($result);
 
 ?>
 
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<title>Edit Mobile | Agrawal Brothers Pvt. Ltd.</title>

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

<h1>Edit Mobile</h1>
<div id="main">

<div id="content">

<div id="header">
</div>
<div style="clear: both;"><div></div></div>


<div class="content">
    <div id="signupbox">
       <div id="signuptab">
        <ul>
          <li id="signupcurrent"><a href=" ">Update Mobile Details</a></li>
        </ul>
      </div>
      <div id="signupwrap">
      		<form id="signupform" autocomplete="on" method="post" action="edit_mobile_p.php" enctype="multipart/form-data">
	  		  <table>
				<tr>
				<td class="label"><label for="brand">Brand</label></td>
				<td class="field">
			
                                    <?php
					function create_dropdown($identifier,$pairs,$first,$brand)
					   {
					      $dropdown="<select name=\"$identifier\"> ";
					       $dropdown.="<option>$first</option>";
						
						foreach($pairs AS $value => $name)
						{
						   if($name==$brand)
						     echo "";
						   else
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
					   echo create_dropdown("bname",$pairs,$brand,$brand);
					   mysql_close();
					   ?>
                                </td>
				<td class="status"></td>
			  </tr>
				
                          <tr>
	  		  	<td class="label"><label for="model">Model</label></td>
	  		  	<td class="field"><input id="model" name="model" type="text" <?php echo "value='".$model."'"; ?> title="Enter the mobile model"/></td>
	  		  	<td class="status"></td>
	  		  </tr>
                          
                          <tr>
	  			<td class="label"><label for="network">Network</label></td>
	  			<td class="field">
				<?php
				 if($network=="GSM")
				 {
					 echo "<input type='radio' id='network' name='network' value='GSM' checked='checked'/>GSM";
					 echo "<input type='radio' name='network' value='CDMA'/>CDMA";
				 }
				 else
				 {
					echo "<input type='radio' id='network' name='network' value='GSM'/>GSM";
					echo "<input type='radio' name='network' value='CDMA' checked='checked'/>CDMA";
				 }
				 ?>
				</td>
	  			<td class="status"></td>
	  		  </tr>
                          
                          <tr>
	  			<td class="label"><label for="dualsim">Dual SIM</label></td>
	  			<td class="field">
				<?php
				 if($dualsim=="Yes")
				 {
					 echo "<input type='radio' id='dualsim' name='dualsim' value='Yes' checked='checked'/>Yes"; 
				         echo "<input type='radio' name='dualsim' value='No'/>No";
				 }
				 else
				 {
					echo "<input type='radio' id='dualsim' name='dualsim' value='Yes'/>Yes"; 
				        echo "<input type='radio' name='dualsim' value='No' checked='checked'/>No";
				 }
				 ?>
				</td>
	  			<td class="status"></td>
	  		  </tr>
                          
			  <tr>
	  			<td class="label"><label for="touchscreen">Touchscreen</label></td>
	  			<td class="field">
				<?php
				 if($touchscreen=="Yes")
				 {
					 echo "<input type='radio' id='touchscreen' name='touchscreen' value='Yes' checked='checked'/>Yes"; 
				         echo "<input type='radio' name='touchscreen' value='No'/>No";
				 }
				 else
				 {
					echo "<input type='radio' id='touchscreen' name='touchscreen' value='Yes'/>Yes"; 
				        echo "<input type='radio' name='touchscreen' value='No' checked='checked'/>No";
				 }
				 ?>
				</td>
	  			<td class="status"></td>
	  		  </tr>
			  
                          <tr>
	  			<td class="label"><label for="fm">FM</label></td>
	  			<td class="field">
				<?php
				 if($fm=="Yes")
				 {
					 echo "<input type='radio' id='fm' name='fm' value='Yes' checked='checked'/>Yes"; 
				         echo "<input type='radio' name='fm' value='No'/>No";
				 }
				 else
				 {
					echo "<input type='radio' id='fm' name='fm' value='Yes'/>Yes"; 
				        echo "<input type='radio' name='fm' value='No' checked='checked'/>No";
				 }
				 ?>
				</td>
	  			<td class="status"></td>
	  		  </tr>
                          
                          <tr>
	  			<td class="label"><label for="mp3">MP3</label></td>
	  			<td class="field">
				<?php
				 if($mp3=="Yes")
				 {
					 echo "<input type='radio' id='mp3' name='mp3' value='Yes' checked='checked'/>Yes"; 
				         echo "<input type='radio' name='mp3' value='No'/>No";
				 }
				 else
				 {
					echo "<input type='radio' id='mp3' name='mp3' value='Yes'/>Yes"; 
				        echo "<input type='radio' name='mp3' value='No' checked='checked'/>No";
				 }
				 ?>
				</td>
	  			<td class="status"></td>
	  		  </tr>
                          
                          <tr>
	  			<td class="label"><label for="video">Video</label></td>
	  			<td class="field">
				<?php
				 if($video=="Yes")
				 {
					 echo "<input type='radio' id='video' name='video' value='Yes' checked='checked'/>Yes"; 
				         echo "<input type='radio' name='video' value='No'/>No";
				 }
				 else
				 {
					echo "<input type='radio' id='video' name='video' value='Yes'/>Yes"; 
				        echo "<input type='radio' name='video' value='No' checked='checked'/>No";
				 }
				 ?>
				</td>
	  			<td class="status"></td>
	  		  </tr>
                          
                          <tr>
	  			<td class="label"><label for="camera">Camera</label></td>
	  			<td class="field">
				<?php
				 if($camera=="Yes")
				 {
					 echo "<input type='radio' id='camera' name='camera' value='Yes' checked='checked'/>Yes"; 
				         echo "<input type='radio' name='camera' value='No'/>No";
				 }
				 else
				 {
					echo "<input type='radio' id='camera' name='camera' value='Yes'/>Yes"; 
				        echo "<input type='radio' name='camera' value='No' checked='checked'/>No";
				 }
				 ?>
				</td>
	  			<td class="status"></td>
	  		  </tr>
                          
                          <tr>
	  			<td class="label"><label for="internet">Internet</label></td>
	  			<td class="field">
				<?php
				 if($internet=="Yes")
				 {
					 echo "<input type='radio' id='internet' name='internet' value='Yes' checked='checked'/>Yes"; 
				         echo "<input type='radio' name='internet' value='No'/>No";
				 }
				 else
				 {
					echo "<input type='radio' id='internet' name='internet' value='Yes'/>Yes"; 
				        echo "<input type='radio' name='internet' value='No' checked='checked'/>No";
				 }
				 ?>
				</td>
	  			<td class="status"></td>
	  		  </tr>
                          
                          <tr>
	  			<td class="label"><label for="threeg">3G</label></td>
	  			<td class="field">
				<?php
				 if($threeg=="Yes")
				 {
					 echo "<input type='radio' id='threeg' name='threeg' value='Yes' checked='checked'/>Yes"; 
				         echo "<input type='radio' name='threeg' value='No'/>No";
				 }
				 else
				 {
					echo "<input type='radio' id='threeg' name='threeg' value='Yes'/>Yes"; 
				        echo "<input type='radio' name='threeg' value='No' checked='checked'/>No";
				 }
				 ?>
				</td>
	  			<td class="status"></td>
	  		  </tr>
                          
			  <tr>
	  			<td class="label"><label for="wifi">Wi-Fi</label></td>
	  			<td class="field">
				<?php
				 if($wifi=="Yes")
				 {
					 echo "<input type='radio' id='wifi' name='wifi' value='Yes' checked='checked'/>Yes"; 
				         echo "<input type='radio' name='wifi' value='No'/>No";
				 }
				 else
				 {
					echo "<input type='radio' id='wifi' name='wifi' value='Yes'/>Yes"; 
				        echo "<input type='radio' name='wifi' value='No' checked='checked'/>No";
				 }
				 ?>
				</td>
	  			<td class="status"></td>
	  		  </tr>
			   
			   <tr>
	  			<td class="label"><label for="phonebook_memory">Phonebook Memory</label></td>
	  			<td class="field">
				<input type="text" id="phonebook_memory" name="phonebook_memory" value="<?php echo $phonebook_memory; ?>" />Entries
				</td>
	  			<td class="status"></td>
	  		  </tr>
			   
			   <tr>
	  			<td class="label"><label for="sms_memory">SMS Memory</label></td>
	  			<td class="field">
				<input type="text" id="sms_memory" name="sms_memory" value="<?php echo $sms_memory; ?>"/>Messages
				</td>
	  			<td class="status"></td>
	  		  </tr>
			   
                          <tr>
	  			<td class="label"><label for="bluetooth">Bluetooth</label></td>
	  			<td class="field">
					<?php
				 if($bluetooth=="Yes")
				 {
					 echo "<input type='radio' id='bluetooth' name='bluetooth' value='Yes' checked='checked'/>Yes"; 
				         echo "<input type='radio' name='bluetooth' value='No'/>No";
				 }
				 else
				 {
					echo "<input type='radio' id='bluetooth' name='bluetooth' value='Yes'/>Yes"; 
				        echo "<input type='radio' name='bluetooth' value='No' checked='checked'/>No";
				 }
				 ?>
				</td>
	  			<td class="status"></td>
	  		  </tr>

                          <tr>
	  			<td class="label"><label for="btalktime">Battery Talktime</label></td>
	  			<td class="field">
				<input type="text" id="btalktime" name="btalktime" value="<?php echo $btalktime; ?>" title="Enter the Battery Talktime in Hours"/>Hours
				</td>
	  			<td class="status"></td>
	  		  </tr>
                          
                          <tr>
	  			<td class="label"><label for="bstandby">Battery Standby</label></td>
	  			<td class="field">
				<input type="text" id="bstandby" name="bstandby" value="<?php echo $bstandby; ?>" title="Enter the Battery Standby Time in Days"/>Days
				</td>
	  			<td class="status"></td>
	  		  </tr>
                          
                          <tr>
	  			<td class="label"><label for="price">Price</label></td>
	  			<td class="field">
				<input type="text" id="price" name="price" value="<?php echo $price; ?>" title="Enter the price of the mobile"/>Rupees
				</td>
	  			<td class="status"></td>
	  		  </tr>
                          
                          <tr>
	  			<td class="label"><label for="special">Special Features</label></td>
	  			<td class="field">
				<textarea name="special" id="special"><?php echo $special; ?></textarea>
				</td>
	  			<td class="status"></td>
	  		  </tr>
			  
			  <tr>
	  			<td class="label"><label for="colors">Colors Available</label></td>
	  			<td class="field">
				<textarea name="colors" id="colors"><?php echo $colors; ?></textarea>
				</td>
	  			<td class="status"></td>
	  		  </tr>
                          
			  <tr>
	  			<td class="label"><label for="image">Image</label></td>
	  			<td class="field">
					
				<div style="display:none;">
				<input type="text" name="photoid" value="<?php echo $photoid; ?>">
				<input type="text" name="mobid" value="<?php echo $mobid; ?>">
				</div>
				
				<input type="hidden" name="MAX_FILE_SIZE" value="2000000">
				<img src="final_retrieve.php?photoid=<?php echo $photoid; ?>" alt="Image Not Found">
				<input type="checkbox" name="changeimage" onclick="if(document.getElementById('userfile').style.display=='block'){document.getElementById('userfile').style.display='none';}else{document.getElementById('userfile').style.display='block';}" value="changeimage">Change Image
				<div id="userfile" style="position:relative; display:none;">
                                <input name="userfile" type="file">
				</div>
				</td>
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

                                      
                          