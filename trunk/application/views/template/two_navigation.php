<?php
include 'header.php';
include 'navigator.php';
?>
<div id="middle_right">
    <div id="headercontent">
        <?php echo $name . " / " . $number ;?>
    </div>
    <div id="navigator_2">
        <?php
        foreach ($links_2 as $link => $value) :
        ?>
        <div class="link_2">
        <?php
        echo HTML::anchor($link, $value['title']);
        ?>
        </div>
        <?php
        endforeach;
        ?>
    </div>
    <div id="content_2column">
        <?php
        echo $content;
        ?>
    </div>
</div>
<div class="clear"></div>
<?php include 'footer.php'?>