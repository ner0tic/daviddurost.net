<?php
    header("Content-Type: text/css");
    require('scheme.css.php');
?>
#git-commit-wrapper {

}
#git-commit-wrapper h2 {

}
ul.git-commits {}
li.git-commit {
  border-bottom: 2px dashed <?php echo $gray ?>;
}
li.git-commit:hover {
  background: <?php echo $gray ?>;
}
li.git-commit img {
  display: inline;
}
li.git-commit h2 {
  color: <?php echo $gray ?>;
  font-weight: none;
  display: inline-block;
  vertical-align: 8px;
  line-height: 15px;
}
li.git-commit hr {
  border: none !important;
  color: <?php echo $ltGray ?>;
}
span.git-commit-stats {
  font-size: x-small;
  line-height:19px;
  max-height: 19px;
  max-width: 210px;
  overflow: hidden;
  display: block;
}
span.git-commit-stats a {}