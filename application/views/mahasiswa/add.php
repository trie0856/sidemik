add
<?php echo Form::open(NULL, array('method'=>'post'));?>
<table>
    <tr>
        <td><?php echo Form::label('nim', 'NIM')?></td>
        <td><?php echo Form::input('nim');?></td>
    </tr>
    <tr>
        <td><?php echo Form::label('username', 'Username')?></td>
        <td><?php echo Form::input('username');?></td>
    </tr>
    <tr>
        <td><?php echo Form::label('nama', 'Nama')?></td>
        <td><?php echo Form::input('nama');?></td>
    </tr>
    <tr>
        <td><?php echo Form::label('tempat_lahir', 'Tempat Lahir')?></td>
        <td><?php echo Form::input('tempat_lahir');?></td>
    </tr>
    <tr>
        <td><?php echo Form::label('email', 'Email');?></td>
        <td><?php echo Form::input('email');?></td>
    </tr>
    <tr>
        <td><?php echo Form::label('alamat', 'Alamat')?></td>
        <td><?php echo Form::input('alamat');?></td>
    </tr>
    <tr>
        <td><?php echo Form::label('no_hp', 'Nomor Handphone')?></td>
        <td><?php echo Form::input('no_hp');?></td>
    </tr>
    <tr>
        <td><?php echo Form::label('nama_ayah', 'Nama Ayah')?></td>
        <td><?php echo Form::input('nama_ayah');?></td>
    </tr>

    <tr>
        <td><?php echo Form::label('telp_rumah', 'Telepon Rumah')?></td>
        <td><?php  echo Form::input('telp_rumah');?></td>
    </tr>
    <tr>
        <td><?php echo Form::label('tahun_masuk', 'Tahun Masuk')?></td>
        <td><?php echo Form::input('tahun_masuk');?></td>
    </tr>
    <tr>
        <td><?php echo Form::label('status_kelulusan', 'Status Kelulusan')?></td>
        <td><?php echo Form::input('status_kelulusan');?></td>
    </tr>
    <tr>
        <td><?php echo Form::button('submit', 'Tambah')?></td>
        <td></td>
    </tr>
</table>
<?php echo Form::close(); ?>