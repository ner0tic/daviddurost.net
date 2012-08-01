<?php
    header("Content-Type: text/css");
    require('scheme.css.php');
?>
.contact-wrapper { max-width: 990px; margin: 0 auto; display: block !important; }
.contact-wrapper > div { border-top: 1px solid <?php echo $ltGray ?>; }
.contact-wrapper div h1 { vertical-align: baseline; position: relative; left: 0px; top: -1px; font-size: 12px; font-weight: bold; text-transform: uppercase; letter-spacing: 2px; color: <?php echo $ltGray ?>; text-shadow: <?php echo $offWhite ?> 1px 1px 1px; }
.contact-wrapper > div > p { padding-left: 15px; padding-right: 15px; }

.contact-item { width: 280px; height: /*280*/60px; float: left; display: inline-block; }
.contact-button { margin: 20px; background: #914f53; background: -webkit-gradient(linear, left top, left bottom, from(#914f53), to(#a6484e)); background: -moz-linear-gradient(top,  #914f53,  #a6484e); filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#914f53', endColorstr='#a6484e'); border: 1px solid #6a2e32; color: #fff; cursor: pointer; font-family: "Helvetica Neue", Helvetica, Arial, sans-serif; font-size: 11px; font-weight: bold; height: 30px; line-height: 30px; padding: 0 10px; text-align: center; text-shadow: rgba(0,0,0,.1) 0 -1px 0; text-transform: uppercase; -moz-border-radius: 5px; -webkit-border-radius: 5px; border-radius: 5px; max-width: 200px; }
.contact-button:hover { background: #914f53; background: -webkit-gradient(linear, left top, left bottom, from(#914f53), to(#a6484e)); background: -moz-linear-gradient(top,  #914f53,  #a6484e); filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#914f53', endColorstr='#a6484e'); }
.contact-button:active { background: #a6484e; background: -webkit-gradient(linear, left top, left bottom, from(#a6484e), to(#914f53)); background: -moz-linear-gradient(top,  #a6484e,  #914f53); filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#a6484e', endColorstr='#914f53');}
a.contact-button, .contact-button a { color: #fff; display: block; text-decoration: none; }
input.contact-button {line-height: normal !important;}
@-moz-document url-prefix() { input.contact-button {padding-bottom: 2px;} }

.contact-form-wrapper { /*max-width: 195px;*/ float: left; display: none; }
textarea#contact_message { width: 180px; height: 105px; }
label { font-weight: bold; color: <?php echo $offBlack ?>; display: block; }

.contact-twitter,
.contact-email,
.contact-im,
.contact-fb,
.contact-in { height: 40px; width: auto; }

.contact-twitter img,
.contact-email img,
.contact-im img,
.contact-fb img,
.contact-in img,
.contact-item-link{ width: 70px; height: 80px; }
.contact-item span { display: none; }

input[type=text], input[type=url], textarea, select { width: 400px !important; border: 1px solid <?php echo $black ?>; }
select { width: 410px !important; }
.contact-social-wrapper { width: 49%; }
.social-bar-wrapper { max-width: 49%; }
input[type=submit] {}

div.social-bar-wrapper { position: relative; margin: 0 auto; top: -20px; position: relative; }
ul.social-links { max-width: 400px; margin: 0 auto;}
ul.social-links,li.social-link { display: inline; }
