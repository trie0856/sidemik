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
                <a href="<?php echo URL::site();?>">
                    <div id="logo">
                    </div>
                </a>
                <div id="greeting_logout">
                    <div id="greeting">
                    <?php echo $greeting; ?>
                    </div>
                <?php
                if ($auth_user->logged_in()) :
                ?>
                    <div id="logout">
                    > 
                    <?php echo HTML::anchor('user/logout', 'Logout')?>
                    </div>
                <?php
                endif;
                ?>
                    <div class="clear">
                        
                    </div>
                </div>
            </div>
            <div id="middle">