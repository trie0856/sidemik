edit
<?php echo Form::open(NULL, array('method'=>'post'));?>
<table>
    <tr>
        <td><?php echo 'Username' ?></td>
        <td><?php echo $user->username ?></td>
    </tr>
    <tr>
        <td><?php echo Form::label('password', 'Password')?></td>
        <td><?php echo Form::input('password', $user->password);?></td>
    </tr>
    <tr>
        <td><?php echo Form::button('submit', 'Edit')?></td>
        <td></td>
    </tr>
</table>
<?php echo Form::close(); ?>