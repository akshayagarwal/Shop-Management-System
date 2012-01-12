<?php
include "dbinst.php";
$completed=$_POST['completed'];
// Insert any new image into database
if ($completed == 1) {
        // Need to add - check for large upload. Otherwise the code
        // will just duplicate old file ;-)
        // ALSO - note that latest.img must be public write and in a
        // live appliaction should be in another (safe!) directory.
        move_uploaded_file($_FILES['imagefile']['tmp_name'],"latest.img");
        $instr = fopen("latest.img","rb");
        $image = addslashes(fread($instr,filesize("latest.img")));
        if (strlen($image) < 149000) {
                mysql_query ("insert into pix (title, imgdata) values (\"".
                $_REQUEST[whatsit].
                "\", \"".
                $image.
                "\")");
        } else {
                $errmsg = "Too large!";
        }
}

// Find out about latest image

$gotten = @mysql_query("select * from pix order by pid desc limit 1");
if ($row = @mysql_fetch_assoc($gotten)) {
        $title = htmlspecialchars($row[title]);
        $bytes = $row[imgdata];
} else {
        $errmsg = "There is no image in the database yet";
        $title = "no database image available";
        // Put up a picture of our training centre
        $instr = fopen("../wellimg/ctco.jpg","rb");
        $bytes = fread($instr,filesize("../wellimg/ctco.jpg"));
}

// If this is the image request, send out the image

if ($_REQUEST[gim] == 1) {
        header("Content-type: image/jpeg");
        print $bytes;
        exit ();
        }
?>

<html><head>
<title>Upload an image to a database</title>
<body bgcolor=white><h2>Here's the latest picture</h2>
<font color=red><?= $errmsg ?></font>
<center><img src=?gim=1 width=144><br>
<b><?= $title ?></center>
<hr>
<h2>Please upload a new picture and title</h2>

<form enctype=multipart/form-data method=post action="upload_mobile.php">
<input type=hidden name=MAX_FILE_SIZE value=150000>
<input type=hidden name=completed value="1">
Please choose an image to upload: <input type=file name=imagefile><br>
Please enter the title of that picture: <input name=whatsit><br>
then: <input type=submit></form><br>
<hr>
By Graham Ellis - graham@wellho.net
</body>
</html>