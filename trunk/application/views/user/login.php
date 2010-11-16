<?php echo Form::open(NULL, array('method' => 'post'))?>
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
