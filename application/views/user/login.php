<?php echo Form::open(NULL, array('method' => 'post'))?>
    <?php if(isset($status) && $status == FALSE) : ?>
    <div class="error_login">
        username dan password tidak cocok.
    </div>
    <?php endif;?>
    <table>
        <tr>
            <td>username</td>
            <td><?php echo Form::input('username')?></td>
        </tr>
        <tr>
            <td>password</td>
            <td><?php echo Form::password('password')?></td>
        </tr>
        <tr>
            <td></td>
            <td><?php echo Form::submit('login','Masuk Log')?></td>
        </tr>
    </table>
<?php echo Form::close()?>