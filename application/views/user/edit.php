<script type="text/javascript">
    $(document).ready(function() {
        $("#ubah_password_form").validate({
            rules : {
                password : {
                    required : true
                },
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

<h2>Ubah Password</h2>

<?php echo Form::open(NULL, array('method'=>'post', 'id' => 'ubah_password_form'));?>
<table>
    <tr>
        <td width="150"><?php echo 'Username' ?></td>
        <td><?php echo $user->username ?></td>
    </tr>
    <tr>
        <td><?php echo Form::label('password', 'Password')?></td>
        <td><?php echo Form::password('password', NULL, array('id' => 'password'));?></td>
    </tr>
    <tr>
        <td><?php echo Form::label('konfirmasi_password', 'Konfirmasi Password')?></td>
        <td><?php echo Form::password('konfirmasi_password', NULL, array('id' => 'konfirmasi_password'));?></td>
    </tr>
    <tr>
        <td></td>
        <td><?php echo Form::button('submit', 'Ubah')?></td>
    </tr>
</table>
<?php echo Form::close(); ?>