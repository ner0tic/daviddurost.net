<?php
    header("Content-Type: text/css");
    require('scheme.css.php');
?>
li#profile-link a { border-bottom: 2px solid <?php echo $red ?>; }
.profile-wrapper { max-width: 990px; margin: 0 auto; display: block !-important; }

#avatar-wrapper { width: 49%; float: left; }
#avatar-wrapper img { max-width: 400px; }
#avatar-wrapper span { font-style: italics; font-size: x-small; display: block; }

#tweets-wrapper { margin-top: 15px; }
#tweets-wrapper span { display: inline; vertical-align: top; }
#tweets-wrapper span a { font-family: Alexa; font-size: 12em !important;}
.tweet {}
.tweet div.container { width: 25%; float: left; }
.tweet-text { width: 70%; float: right; vertical-align: top; }
.tweet-avatar-wrapper {  }
.tweet-avatar-wrapper a { text-align: center;  margin: auto auto; display: block; width: 100%; }
.tweet-avatar-wrapper a span { color: <?php echo $twitterBlue ?>; font-family: Picto; font-size: 1.5em !important; position: relative; top: -2px; } 
.tweet-timestamp { font-family: Alexa; margin-top: -8px; }
.tweet-timestamp li { display: inline; list-style: none; float: left; padding-left: 3px; }
li.time { display: block !important; margin-top: -6px; }

#about-me { width: 49%; float: right; vertical-align: top;}

ul#skills li { display: inline; width: 100%; }

hr { background: none; color: transparent; border: 0; border-bottom: 2px dashed <?php echo $ltGray ?>; }