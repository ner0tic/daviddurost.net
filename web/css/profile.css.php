<?php
    header("Content-Type: text/css");
    require('scheme.css.php');
?>
.profile-wrapper { max-width: 990px; margin: 0 auto; display: block !-important; }
.profile-wrapper div { border-top: 1px solid <?php echo $ltGray ?>; float: left; width: 100%; margin-bottom: 15px; }
.profile-wrapper div h1 { vertical-align: baseline; position: relative; left: 0px; top: -1px; font-size: 12px; font-weight: bold; text-transform: uppercase; letter-spacing: 2px; color: <?php echo $ltGray ?>; text-shadow: <?php echo $offWhite ?> 1px 1px 1px; }
.profile-wrapper div p { padding-left: 15px; padding-right: 15px; font-weight: bold; letter-spacing: 2px; color: <?php echo $offBlack ?>; text-shadow:<?php echo $white ?> 1px 1px 1px; font-family: Nadis; margin-top: 60px; }
.profile-wrapper div p a { color: <?php echo $red ?>; }
.profile-wrapper div p a:hover { color: <?php echo $yellow ?>; }
img.profile-img { float: left; border: 15px solid <?php echo $gray ?>; -moz-border-radius: 5px; -webkit-border-radius: 5px; border-radius: 5px; margin-right: 15px;}
hr { border: 0; border-top: 1px dashed <?php echo $red ?>; height: 1px; margin-top: 25px; }
.profile-wrapper div ul { margin: 0 auto; column-count: 2; width: 50%; float: left; padding-left: 0; margin-left: 0; }
.profile-wrapper div ul li { margin: 0 auto; font-weight: bold; color: <?php echo $red ?>; line-height: 19px; margin: 20px 20px 20px 20px; max-width: 300px; }
.profile-wrapper div ul li:nth-child(odd) { clear: left; }
.profile-wrapper img { width: 30%; margin: 0 auto; position: relative; }