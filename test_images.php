<?php
include "dbinst.php";

$handle = fopen("edclogo.jpg", "rb");
$img = fread($handle, filesize('edclogo.jpg'));
fclose($handle);
//die($img);

$sql = "insert into test_imgs values(null,'$img','jpg','female')";

mysql_query($sql) or die('Bad Query at 12');

echo "Success! You have inserted your picture!";
?>


<script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script><fb:like href="http://www.agrawalbrothers.co.in"></fb:like>

<iframe src="http://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fwww.agrawalbrothers.co.in&amp;layout=standard&amp;show_faces=true&amp;width=450&amp;action=like&amp;colorscheme=light&amp;height=80" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:450px; height:80px;" allowTransparency="true"></iframe>

<div id="fb-root"></div>
<script>
  window.fbAsyncInit = function() {
    FB.init({appId: 'your app id', status: true, cookie: true,
             xfbml: true});
  };
  (function() {
    var e = document.createElement('script'); e.async = true;
    e.src = document.location.protocol +
      '//connect.facebook.net/en_US/all.js';
    document.getElementById('fb-root').appendChild(e);
  }());
</script>
