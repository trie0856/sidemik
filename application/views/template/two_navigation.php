<?php include 'header.php'?>
<div id="navigator">
    <?php
    foreach ($links as $title => $value) {
    echo HTML::anchor($value['link'], $title) . "<br />";
    }
    ?>
</div>
<div id="middle_right">
    <div id="navigator_2">
        | 
        <?php
        foreach ($links_2 as $link => $value) {
            echo HTML::anchor($link, $value['title']) . ' | ';
        }
        ?>
    </div>
    <div id="content">
        <?php
        echo $content;
        ?>
    </div>
</div>
<div class="clear"></div>
<?php include 'footer.php'?>