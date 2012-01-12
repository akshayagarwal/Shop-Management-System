<?php
include "dbinst.php";
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
$wifi=$_POST['wifi'];
$phonebook_memory=$_POST['phonebook_memory'];
$sms_memory=$_POST['sms_memory'];
$sname=$brand." ".$model;
/*********------------------------Image Upload------------------------------------**********/
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

mysql_query($query) or die('Error, Kindly Try Again');

$query="SELECT ID FROM upload WHERE name='$fileName' && size='$fileSize'";
$result=mysql_query($query) or die('Error,Kindly Try Again');

list($photo_id)=mysql_fetch_array($result);
echo "<br>File $fileName uploaded successfully<br>";
}

$query="INSERT INTO mobiles SET BRAND='$brand',MODEL='$model',NETWORK='$network',DUALSIM='$dualsim',TOUCHSCREEN='$touchscreen',FM='$fm',MP3='$mp3',VIDEO='$video',CAMERA='$camera',INTERNET='$internet',THREEG='$threeg',BLUETOOTH='$bluetooth',BSTANDBY='$bstandby',BTALKTIME='$btalktime',PRICE='$price',SPECIAL='$special',COLORS='$colors',SNAME='$sname',PHOTOID='$photo_id',PMEMORY='$phonebook_memory',SMEMORY='$sms_memory',WIFI='$wifi'";
$results=mysql_query($query);
if($results)
{
    echo "<b>New Mobile Added Successfully!";
}
else
{
    echo "<b>New Mobile Could Not Be Added! Kindly Refresh or Try Again!";
}

mysql_close();
?>