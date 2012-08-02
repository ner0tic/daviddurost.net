<?php
    header("Content-Type: text/css");
    require('scheme.css.php');
?>
/************************************************
**                Dom                          **
************************************************/
a:link, a:visited, a:active { color : <?php echo $dkGreen ?>; text-decoration: none; font-weight : bold;}
a:hover { color : <?php echo $red ?>; text-decoration: none; font-weight : bold;}
h1 { font-size : 24px; color : <?php echo $red?>; font-weight : bold; margin: 0;}
h2 { font-size : 24px; color : <?php echo $red?>; font-weight : normal; margin: 0;}
h3 { font-size : 18px; color : <?php echo $offBlack?>; font-weight : normal; line-height: 20pt; margin: 0;}
/************************************************
**                Global                       **
************************************************/
@font-face { font-family: Alexa; src: url('AlexaStd.otf'); }
@font-face { font-family: Comfortaa; src: url('Comfotraa-Regular.ttf'); }
@font-face { font-family: Nadis; src: url('nadis.ttf'); }
@font-face { font-family: Social; src: url('Social-Logos.ttf'); }
@font-face { font-family: Picto; src: url('modernpics.otf'); }
body { background: <?php echo $offWhite ?>; /*url(/images/body-bg.png) repeat-x fixed center top;*/ font-family: "Helvetica Neue", Arial, Helvetica, Geneva, sans-serif; }
#container { min-width: 920px; margin-right: auto; margin-left: auto; }
/************************************************
**                Header                       **
************************************************/
header { height: 140px; padding-top: 15px; }
header h1 a { width:240px; height: 100px; margin-top: 34px; margin-left: 41px; padding-right: 0; float: left; color: <?php echo $red ?>; font-family: verdana, arial; font-size: 24pt; font-weight: bold; letter-spacing: -3px; text-align: left; /*text-indent: -9999px; background: url(/images/logo.png) no-repeat top left;*/ text-shadow: #e5e5e5 1px 1px 1px;}
header h1 a span { color: <?php echo $green ?>; }
header h1 > span { height: 20px; float: left; margin-left: -14px; margin-top: 10px; padding-top: 40px; padding-left: 0px; color: <?php echo $green ?> !-important; font-weight: normal; letter-spacing: -1px; font-size: 18pt; font-style: italic; font-family: Alexa; text-shadow: #e5e5e5 1px 1px 1px;}
header ul { min-width: 225px; margin-top: 60px; margin-right: 10px; float: right; font-size: 9px; font-weight: bold; text-transform: uppercase; letter-spacing: 2px; color: <?php echo $green ?>; text-shadow: #000 1px 1px 1px; }
header ul li { margin-left: 2px; display: inline-block; }
header ul li a { display: block; opacity: 0.5; -webkit-transition: opacity .5s linear; }
header ul li a:hover { opacity: 1; -webkit-transition: opacity .5s linear; color: <?php echo $red ?>; }
header ul li.active a { border-bottom: 2px solid <?php echo $red ?>; }
/************************************************
**                Content                      **
************************************************/
h2 { color: <?php echo $red ?>; font-weight: bold; font-size: 2em !important; font-variant: small-caps; font-family: Alexa, arial; }
h2 span { position: relative; top: -16px; display: block; text-align: right; width: 50%; font-size: 0.7em !important; color: <?php echo $gray ?>;}
h2 span img { height: 0.7 em; }
/************************************************
**                Footer                       **
************************************************/
.copyright { letter-spacing: 2px; color: <?php echo $offBlack ?>; font-size: 10px; font-weight: bold; text-transform: uppercase; text-align: center; clear: both; padding-top: 40px; }
ul.links { max-width: 920px; padding: 35px 15px 35px 30px; font-size: 9px; font-weight: bold; text-transform: uppercase; letter-spacing: 2px; text-align: center; margin: 0 auto; }
ul.links a { margin: 0 auto; padding: 15px 30px 15px 45px; text-decoration: none; color: <?php echo $offBlack ?>; }
ul.links a:hover { color: <?php echo $red ?>; }
ul.links li { color: <?php echo $offBlack ?>; display: inline; }
footer p { width: 300px; float: left; text-indent: -9999px; display: none; }
footer hr { border: 0; color: <?php echo $red ?>; height: 1px; background-color: <?php echo $red ?>; width: 475px; margin: 0 auto; margin-top: 15px; margin-bottom: -10px;}
hr.small { width: 238px !important; }
/*************************************************
**              DEBUG                           **
*************************************************/
.debug { border: 2px solid red ?>; }
.debug_y { border 2px solid yellow ?>; }
.debug_b { border 2px solid blue ?>; }
.margin-top-10 { margin-top: 10px; }
/************************************************
**              Buttons                        **
************************************************/
/***************Green***************************/
.greenButton { background: #A7E300; background: -webkit-gradient(linear, left top, left bottom, from(#A7E300), to(#99D100)); background: -moz-linear-gradient(top,  #A7E300,  #99D100); filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#A7E300', endColorstr='#99D100'); border: 1px solid #87b800; color: #fff; cursor: pointer; font-family: "Helvetica Neue", Helvetica, Arial, sans-serif; font-size: 11px; font-weight: bold; height: 30px; line-height: 30px; padding: 0 10px; text-align: center; text-shadow: rgba(0,0,0,.1) 0 -1px 0; text-transform: uppercase; -moz-border-radius: 5px; -webkit-border-radius: 5px; border-radius: 5px; }
.greenButton:hover { background: #b2eb14; background: -webkit-gradient(linear, left top, left bottom, from(#b2eb14), to(#a4da14)); background: -moz-linear-gradient(top,  #b2eb14,  #a4da14); filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#b2eb14', endColorstr='#a4da14'); }
.greenButton:active { background: #99D100; background: -webkit-gradient(linear, left top, left bottom, from(#99D100), to(#A7E300)); background: -moz-linear-gradient(top,  #99D100,  #A7E300); filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#99D100', endColorstr='#A7E300');}
a.greenButton, .greenButton a { color: #fff; display: block; text-decoration: none; }
input.greenButton {line-height: normal !important;}
@-moz-document url-prefix() { input.greenButton {padding-bottom: 2px;} }
/***************Grey****************************/
.greyButton { background: #e6e6e8; background: -webkit-gradient(linear, left top, left bottom, from(#f8f8f9), to(#e6e6e8)); background: -moz-linear-gradient(top,  #f8f8f9,  #e6e6e8); filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#f8f8f9', endColorstr='#e6e6e8'); border: 1px solid #ccc; color: #999; cursor: pointer; font-family: "Helvetica Neue", Helvetica, Arial, sans-serif; font-size: 11px; font-weight: bold; height: 30px; line-height: 30px; padding: 0 10px; text-align: center; text-shadow: rgba(255,255,255,1) 0 1px 0; text-transform: uppercase; -moz-border-radius: 5px; -webkit-border-radius: 5px; border-radius: 5px; }
.greyButton:hover { background: #fcfcfc; background: -webkit-gradient(linear, left top, left bottom, from(#fcfcfc), to(#f3f2f3)); background: -moz-linear-gradient(top,  #fcfcfc,  #f3f2f3); filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#fcfcfc', endColorstr='#f3f2f3'); }
.greyButton:active { background: #f3f2f3; background: -webkit-gradient(linear, left top, left bottom, from(#f3f2f3), to(#fcfcfc)); background: -moz-linear-gradient(top,  #f3f2f3,  #fcfcfc); filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#f3f2f3', endColorstr='#fcfcfc'); }
a.greyButton, .greyButton a { color: #999; display: block; text-decoration: none; }
/***************Orange**************************/
.orangeButton { background: #A7E300; background: -webkit-gradient(linear, left top, left bottom, from(#ff9900), to(#ff6200)); background: -moz-linear-gradient(top,  #ff9900,  #ff6200); filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ff9900', endColorstr='#ff6200'); border: 1px solid #e55800; color: #fff; cursor: pointer; font-family: "Helvetica Neue", Helvetica, Arial, sans-serif; font-size: 11px; font-weight: bold; height: 30px; line-height: 30px; padding: 0 10px; text-align: center; text-shadow: rgba(0,0,0,.1) 0 -1px 0; text-transform: uppercase; -moz-border-radius: 5px; -webkit-border-radius: 5px; border-radius: 5px; }
.orangeButton:hover { background: #ffad32; background: -webkit-gradient(linear, left top, left bottom, from(#ffad32), to(#ff8132)); background: -moz-linear-gradient(top,  #ffad32,  #ff8132); filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffad32', endColorstr='#ff8132'); }
.orangeButton:active { background: #ff8132; background: -webkit-gradient(linear, left top, left bottom, from(#ff8132), to(#ffad32)); background: -moz-linear-gradient(top,  #ff8132,  #ffad32); filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ff8132', endColorstr='#ffad32'); }
a.orangeButton, .orangeButton a { color: #fff; display: block; text-decoration: none; }
