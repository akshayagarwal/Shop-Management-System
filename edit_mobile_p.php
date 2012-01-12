<?php
include "dbinst.php";
$mobid=$_REQUEST['mobid'];
$brand=$_POST['bname'];
$model=$_POST['model'];
$network=$_POST['network'];
$dualsim=$_POST['dualsim'];
$touchscreen=$_POST['touchscreen'];
$fm=$_POST['fm'];
$mp3=$_POST['mp3'];
$video=$_POST['video'];
$camera=$_POST['camera'];
$internet=$_POST['internet'];
$threeg=$_POST['threeg'];
$bluetooth=$_POST['bluetooth'];
$btalktime=$_POST['btalktime'];
$bstandby=$_POST['bstandby'];
$price=$_POST['price'];
$special=$_POST['special'];
$colors=$_POST['colors'];
$photoid=$_POST['photoid'];
$wifi=$_POST['wifi'];
$phonebook_memory=$_POST['phonebook_memory'];
$sms_memory=$_POST['sms_memory'];
$sname=$brand." ".$model;
/*********------------------------Image Upload------------------------------------**********/
if($_POST['changeimage'])
{
	if($_FILES['userfile']['size'] >  0)
	{
	$fileName = $_FILES['userfile']['name'];
	$tmpName  = $_FILES['userfile']['tmp_name'];
	$fileSize = $_FILES['userfile']['size'];
	$fileType = $_FILES['userfile']['type'];
	
	$fp      = fopen($tmpName, 'r');
	$content = fread($fp, filesize($tmpName));
	$content = addslashes($content);
	fclose($fp);
	
	if(!get_magic_quotes_gpc())
	{
	    $fileName = addslashes($fileName);
	}

$query = "INSERT INTO upload (name, size, type, content ) ".
"VALUES ('$fileName', '$fileSize', '$fileType', '$content')";

$result=mysql_query($query) or die('Error, Kindly Try Again');

if($result)
{
$query="DELETE FROM upload WHERE ID='$photoid'";
$result=mysql_query($photoid);

$query="SELECT ID FROM upload WHERE name='$fileName' && size='$fileSize'";
$result=mysql_query($query) or die('Error,Kindly Try Again');

list($photoid)=mysql_fetch_array($result);
}

echo "<br>File $fileName uploaded successfully<br>";
}
}

$query="UPDATE mobiles SET BRAND='$brand',MODEL='$model',NETWORK='$network',DUALSIM='$dualsim',TOUCHSCREEN='$touchscreen',FM='$fm',MP3='$mp3',VIDEO='$video',CAMERA='$camera',INTERNET='$internet',THREEG='$threeg',BLUETOOTH='$bluetooth',BSTANDBY='$bstandby',BTALKTIME='$btalktime',PRICE='$price',SPECIAL='$special',COLORS='$colors',SNAME='$sname',PHOTOID='$photoid',PMEMORY='$phonebook_memory',SMEMORY='$sms_memory',WIFI='$wifi' WHERE ID='$mobid'";
$results=mysql_query($query);
if($results)
{
    echo "<b>Mobile Updated Successfully!";
}
else
{
    echo "<b>Mobile Could Not Be Updated! Kindly Refresh or Try Again!";
}

mysql_close();
?>