<?php
    include_once 'scheme.css.php';
    header("Content-Type: text/css");
?>
@font-face { font-family: Alexa; src: url('AlexaStd.otf'); }
.text-input, .select-input {
    -webkit-box-shadow: #D0D0D0 0px 1px 2px;
    background: <?php echo $white ?>;
    border: 1px solid <?php echo $black ?>;
    color: <?php echo $black ?>;
    font-size: 1.16667em;
    padding: 3px 4px 3px;
    display: block;
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
div.contact-social-wrapper.form-wrapper { min-height: 500px; border-right: 1px solid <?php echo $ltGray ?>; }
#contact form { /*background: <?php echo $ltGreen ?>; border-top: 1px solid #cccccc;*/ display: block; margin: 0 auto; padding: 20px; width: 450px; overflow: hidden; }
#contact h2 { color: #444; font-size: 62px; font-weight: bold; left: 5px; margin: 0 auto; margin-bottom: 25px; position: relative; font-family: Alexa, Veranda; }
#contact-form label { font-weight: normal !important; color: <?php echo $black ?>; position: absolute; top: 16px !important; left: 14px !important; }
#contact-form .greenButton, #contact .orangeButton, #contact input[type=submit] { float: right; }

.no-label { display: none; }
form p { position:relative; padding: 10px; }
