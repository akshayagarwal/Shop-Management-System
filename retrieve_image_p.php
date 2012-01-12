<?php

include "dbinst.php";

$sql = "select pics, ext from test_imgs where id='2'";

$result = mysql_query($sql) or die('Bad query at 12!'.mysql_error());

while($row = mysql_fetch_array($result,MYSQL_ASSOC)){

$db_img = $row['pics'];
$type = $row['ext'];


}

 //print_r($db_img );

$db_img = imagecreatefromstring($db_img);

if ($db_img !== false) {
switch ($type) {
case "jpg":
header("Content-Type: image/jpeg");
imagejpeg($db_img);
break;
case "gif":
header("Content-Type: image/gif");
imagegif($db_img);
break;
case "png":
header("Content-Type: image/png");
imagepng($db_img);
break;
}


}
imagedestroy($db_img);
?>
