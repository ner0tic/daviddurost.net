<?php
    header("Content-Type: text/css");
    require('scheme.css.php');
?>
/*****************portfolio*********************/
#content .portfolio { width: 1020px; float: left; clear: both; }
.portfolio-entry { width: 280px; height: 320px; margin-right: 15px; margin-left: 15px; margin-bottom: 20px; padding: 15px 10px; position: relative; float: left; display: inline-block; background: url(/images/drop-shadow.png) no-repeat 0 5px; }
.portfolio-entry div.details { opacity: 0; }
.portfolio-entry:hover div.details { opacity: 1; -webkit-transition: opacity .5s linear; }
.portfolio-entry a { text-decoration: none; }
a.more-info { display: block; }
.portfolio-entry h3 { padding-top: 15px; padding-left: 10px; padding-bottom: 8px; float: left; color: #555; font-weight: bold; font-size: 10px; text-shadow: #fff 1px 1px 1px; text-transform: uppercase; letter-spacing: 2px; }
.portfolio-entry h2 { width: 100%; text-align: right; margin-top: -5px; z-index: 10; color: <?php echo $ltGray ?>; opacity: 0.5; font-size: x-small; }
.status-active { color: <?php echo $red ?> !important; }
.status-paused { color: <?php echo $yellow ?> !important; }
.status-completed { color: <?php echo $alertGreen ?> !important; }
.portfolio-entry p { padding-left: 10px; padding-right: 10px; padding-top: 0; clear: both; color: <?php echo $offBlack ?>; font: 11px/18px "Helvetica Neue", Arial, Helvetica, Geneva, sans-serif; text-shadow: #fff 1px 1px 1px; }
a.status { height: 22px; width: 26px; padding: 0; display: none; position: absolute; top: 203px; left: 260px; text-shadow: #fff 1px 1px 1px; text-transform: uppercase; letter-spacing: 2px; color: #999999; font-weight: bold; font-size: 8px; text-indent: -99999px; }
.shadow { height: 215px; position: absolute; top: -16px; left: -18px; bottom: -20; right: -20px; z-index: -5; background: url(/images/drop-shadow.png) no-repeat; }
img.status { z-index: 101; position: absolute; top: 10px; right: 2px; }
.tag-cloud ul, .tag-cloud li { display: inline; }
.tag-cloud li:after { content: ', '; }
.tag-cloud li:last-child:after { content: none; }
.tag-cloud h3 { vertical-align: middle; }
.tags-list a { font-weight: normal; font-size: x-small; line-height: 0px !important; }

#filters-wrapper { min-width: 290px;  position: absolute; top: 92px; right: 10px; max-width: 315px; }
#filters-wrapper ul { margin-top: 10px; min-width: 290px; }
ul.filters, ul.filter-sub-menu { color: <?php echo $red ?>; display: block; float: right; font-family: 'Helvetica Neue', Arial, Helvetica, Geneva, sans-serif; font-size: 9px; font-weight: bold; height: 12px; letter-spacing: 2px; margin-right: 10px; text-shadow: black 1px 1px 1px; text-transform: uppercase; }
ul.filters li { cursor: pointer; color: <?php echo $red ?>; display: inline-block; float: none; font-family: 'Helvetica Neue', Arial, Helvetica, Geneva, sans-serif; font-size: 9px; font-weight: bold; height: 12px; letter-spacing: 2px; margin-left: 2px; text-shadow: black 1px 1px 1px; min-width: 69px; }
ul.filter-sub-menu { margin-top: -10px !important; }
ul#category-sub-menu { display: none; }

li.filter { color: <?php echo $green ?>; display: inline-block; float: none; font-family: 'Helvetica Neue', Arial, Helvetica, Geneva, sans-serif; font-size: 9px; font-weight: bold; height: 12px; letter-spacing: 2px; list-style-image: none; list-style-position: outside; list-style-type: none; margin-bottom: 0px; margin-left: 2px; margin-right: 0px; margin-top: 0px; min-width: 0px; padding-bottom: 0px; padding-left: 4px; padding-right: 4px; padding-top: 4px; text-align: -webkit-auto; text-shadow: black 1px 1px 1px; text-transform: uppercase; width: 69px; }
li.filter a { display: block; opacity: 0.5; -webkit-transition: opacity .5s linear; }
li.filter a:hover { opacity: 1; -webkit-transition: opacity .5s linear; color: <?php echo $red ?>; }
li.filter.active a { opacity: 1; color: <?php echo $red ?>; }
li.filter-label { font-family: Alexa !important; font-style: italic; font-weight: normal !important; text-transform: none; font-size: 12px !important;  }
.msg-box { position: relative; margin: 0 auto; width: 422px; height: 49px; background: transparent url('/images/msg-box/info-msg-no-projects-found.png') no-repeat center center; }
#loading { background: url('/images/icons/loader.gif') no-repeat center center; position: relative; margin: 0 auto; height: 16px; width: 16px; }

div.form-comment input[type=text] { background: transparent url('/images/forms/comment/input-bg.png') no-repeat center center; width: 290px; border: 0; height: 28px; margin-top: 2px; padding-left: 2px;}
div.form-comment textarea { background: transparent url('/images/forms/comment/text-area.png') repeat center center; width: 290px; border: 0; }
input.submit { background: transparent url('/images/forms/comment/submit-btn.png') no-repeat center center; width: 123px; height: 42px; border: 0;}

td.misc-cell { width: 310px; }
td.details-cell { vertical-align: top; }
.misc-container { margin-top: 4px; }
#social-links { display: block !important; }

li#portfolio-link a { border-bottom: 2px solid <?php echo $red ?>; }