<?php include 'header.php'?>
<div id="navigator">
    <?php
    foreach ($links as $title => $value) {
    echo HTML::anchor($value['link'], $title) . "<br />";
    }
    ?>
</div>
<div id="content">
    <?php
    echo $content;
    ?>
</div>
<div class="clear"></div>
<?php include 'footer.php'?>