<div id="navigator">
    <?php
    foreach ($links as $title => $value) :
    ?>
    <div  class="link">
        <?php echo HTML::anchor($value['link'], $title);?>
    </div>
    <?php
    endforeach;
    ?>
</div>