<?php
    include_once 'scheme.css.php';
    header("Content-Type: text/css");
?>
.text-input, .select-input {
    -webkit-box-shadow: #D0D0D0 0px 1px 2px;
    background: <?php echo $white ?>;
    border: 1px solid <?php echo $black ?>;
    color: <?php echo $black ?>;
    font-size: 1.16667em;
    padding: 3px 4px 3px;
    display: block;
    font-family: Alexa;
    font-variant: small-caps; 
}
.select-input {
    color: <?php echo $black ?>;
}
.radio-input {
    padding: 3px 4px 3px;
    font-size: 1.16667em;
    -webkit-box-shadow: #D0D0D0 0px 1px 2px;
}
.radio-input:after,
.radio-input:before {
    display: block;
}
.radio-input < label {
    display: block;
}
/***************************************************************
    contact form
***************************************************************/
div.contact-social-wrapper.form-wrapper { min-height: 500px; border-right: 2px dashed <?php echo $ltGray ?>; }
div.main-column#contact { top -64px; position: relative; float: right; }
form { /*background: <?php echo $ltGreen ?>; border-top: 1px solid #cccccc;*/ display: block; margin: 0 auto; padding: 20px; width: 450px; overflow: hidden; }
#contact h2 { color: <?php echo $red ?>; font-weight: bold; font-size: 2em !important; font-variant: small-caps; font-family: Alexa, arial; max-width: 490px; margin: 0 auto;  } 
#contact-form div:last-child { margin: 0 auto; text-align: center; }
#contact-form input[type=submit] { margin: 0 auto; }


.no-label { display: none; }
form p { position:relative; padding: 10px; }

label { margin: 6px 0 0 8px; font-family: Alexa; font-variant: small-caps; font-size: 1.16667em; }