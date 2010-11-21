<div id="login_box_outer">
    <div id="login_box_inner">
<?php echo Form::open(NULL, array('method' => 'post'))?>
    <?php if(isset($status) && $status == FALSE) : ?>
    <div class="error_login">
        username dan password tidak cocok.
    </div>
    <?php endif;?>
    <table align="center">
        <tr>
            <td width="100"><b>username</b></td>
            <td><?php echo Form::input('username')?></td>
        </tr>
        <tr>
            <td><b>password</b></td>
            <td><?php echo Form::password('password')?></td>
        </tr>
        <tr>
            <td></td>
            <td align="right"<?php echo Form::button('login','Masuk Log')?></td>
        </tr>
    </table>
<?php echo Form::close()?>
    </div>
</div>