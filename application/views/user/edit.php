<script type="text/javascript">
    $(document).ready(function() {
        $("#add_mahasiswa_form").validate({
            rules : {
                konfirmasi_password: {
                    required : true,
                    equalTo: "#password"
                }
            },
            messages : {
                konfirmasi_password: {
                    equalTo: "Masukkan password yang sama."
                }
            }
        });
    });
</script>

<?php echo Form::open(NULL, array('method'=>'post'));?>
<table>
    <tr>
        <td width="150"><?php echo 'Username' ?></td>
        <td><?php echo $user->username ?></td>
    </tr>
    <tr>
        <td><?php echo Form::label('password', 'Password')?></td>
        <td><?php echo Form::password('password');?></td>
    </tr>
    <tr>
        <td><?php echo Form::label('retype_password', 'Konfirmasi Password')?></td>
        <td><?php echo Form::password('retype_password');?></td>
    </tr>
    <tr>
        <td></td>
        <td><?php echo Form::button('submit', 'Ubah')?></td>
    </tr>
</table>
<?php echo Form::close(); ?>