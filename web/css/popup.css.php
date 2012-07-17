<?php
    header("Content-Type: text/css");
    require('scheme.css.php');
?>
.popup { /*background: rgba(0, 0, 0, .5);*/ height: 100%; left: 0; overflow-x: auto; overflow-y: auto; /*position: absolute;*/ top: 0px; width: 100%; z-index: 101; zoom: 1; margin: 0 auto; }
.popup .project-info { background: white; border: solid black; height: 125px; border-width: 3px 1px; }
.popup .container {  left: 50%; margin-left: -473px; position: absolute; top: 0; width: 962px; }
.popup .close { top: 0px; float: right; }
.curtain { z-index: 50; width: 100%; height: 100%; background: #000; opacity: .75; position: absolute; top: 0px; left: 0px; }
.popup .container { width: 920px; background: #000; }
.popup .container .popup-content-wrapper,
.popup .container .popup-info-wrapper { float: left; }
.popup .container .popup-content-wrapper,
.popup-content-wrapper .popup-content { margin: 0 auto; text-align: center; }
.popup-content img { margin: 0 auto; max-width: 95%;}

.data-loading .project-info-grid .details-cell *,
.data-loading .project-info-grid .comments-cell * { display: none }
.data-loading .project-info-grid .details-cell,
.data-loading .project-info-grid .comments-cell { opacity: 0 }
.project-info-grid .details-cell,
.project-info-grid .comments-cell { opacity: 1; transition: opacity .25s ease-out; -webkit-transition:opacity .25s ease-out; }
.project-info-grid .details-cell,
.project-info-grid .comments-cell { padding: 10px 15px 20px; }
.project-info-grid .details-container,
.project-info-grid .comments-container { word-wrap: break-word; }
.details-container p { font-family: "Helvetica Neue", Arial, Helvetica, Geneva, sans-serif; font-size: small; font-variant: small-caps; font-style: italics; }
.project-info-grid .comments-container,
.project-info-grid .comments-cell { width: 400px; }
.project-info-grid .misc-container,
.project-info-grid .misc { width: 310px; }

.project-info-grid { width: 100% ;}
.ui-grid{ border: 0; border-collapse: collapse; border-spacing: 0; }

.misc-container div { border-top: 1px solid <?php echo $ltGray ?>; }
.misc-container div h3 { vertical-align: baseline; position: relative; left: 0px; top: -8px; font-size: 9px; font-weight: bold; text-transform: uppercase; letter-spacing: 2px; color: <?php echo $ltGray ?>; text-shadow: <?php echo $offWhite ?> 1px 1px 1px; }
/********************************/
#social-links { display: none; }