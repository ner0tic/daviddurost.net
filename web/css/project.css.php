<?php
    header("Content-Type: text/css");
    require('scheme.css.php');
?>
.project-wrapper {max-width: 1200px; margin: 0px auto;}
div.sidebar {float: left; width: 210px; height: 100%;}
.sidebar-widget { border-top: 1px solid <?php echo $ltGray ?>; margin-top: 8px;}
.sidebar:first-child { margin-top: 0 !important;}
.sidebar-widget h3, h3.portfolio-name { vertical-align: baseline; position: relative; left: 0px; top: -8px; font-size: 9px; font-weight: bold; text-transform: uppercase; letter-spacing: 2px; color: <?php echo $ltGray ?>; text-shadow: <?php echo $offWhite ?> 1px 1px 1px; }
ul.social-links {}
li.social-link { display: inline; padding: 5px;}
li.social-link img { width: 30px; height: 30px; }
.social-link a {}
.social-link a img {}
div.content-pane {float: left; top: 0px; max-width: 900px; margin-left: 5px; }
.content-pane h1 {}
.img-wrapper {width: 100%; border-bottom: 1px solid <?php echo $ltGray ?>; padding-bottom: 4px; }
.img-wrapper img { width: 680px;}
.portfolio-desc img.portfolio-download-image { width: auto !important; }
h3.portfolio-name {  }
.portfolio-desc { width: 100%; font-style: italic; }