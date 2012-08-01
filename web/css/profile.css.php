<?php
    header("Content-Type: text/css");
    require('scheme.css.php');
?>
li#profile-link a { border-bottom: 2px solid <?php echo $red ?>; }
.profile-wrapper { max-width: 990px; margin: 0 auto; display: block !-important; }

#avatar-wrapper { width: 49%; float: left; }
#avatar-wrapper img { max-width: 400px; }
#avatar-wrapper span { font-style: italics; font-size: x-small; display: block; }

#twitter-wrapper {}
#tweet-wrapper p { font-family: Picto; font-size: 62px; display: inline; }
#tweet-wrapper span { display: inline; vertical-align: top; }
#twitter-wrapper span a {}
#tweet {}
#tweet-timestamp {}

#about-me { width: 49%; float: right; vertical-align: top;}

ul#skills li { display: inline; width: 100%; }

hr { background: none; color: transparent; border: 0; border-bottom: 2px dashed <?php echo $ltGray ?>; }