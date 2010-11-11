<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title><?php echo $title; ?></title>
    
        <?php foreach ($styles as $file => $type) echo HTML::style($file, array('media' => $type)), "\n" ?>
        <?php foreach ($scripts as $file) echo HTML::script($file), "\n" ?>
        
    </head>
    <body>
        <div id="wrap">
            <div id="header">
                Logo
            </div>
            <div id="middle">
                <div id="navigator">
                    Navigator
                </div>
                <div id="content">
                    <?php
                        echo $content;
                    ?>
                </div>
                <div class="clear"></div>
            </div>
            <div id="footer">
                Copyright &copy; 2010. CCS.
            </div>
        </div>
    </body>
</html>
