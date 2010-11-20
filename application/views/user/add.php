add
<?php echo Form::open(NULL, array('method'=>'post'));?>
<table>
    <tr>
        <td><?php echo Form::label('username', 'Username')?></td>
        <td><?php echo Form::input('username');?></td>
    </tr>
    <tr>
        <td><?php echo Form::label('password', 'Password')?></td>
        <td><?php echo Form::input('password');?></td>
    </tr>
    <tr>
        <td><?php echo Form::label('role', 'Role'); ?></td>
        <td><?php echo Form::select('role', $select_role); ?></td>
    </tr>
    <tr>
        <td><?php echo Form::button('submit', 'Tambah')?></td>
        <td></td>
    </tr>
</table>
<?php echo Form::close(); ?>