edit
<?php
echo Form::open(NULL, array('method'=>'post'));
?>
<table>
    <tr>
        <td><?php echo Form::label('nim', 'NIM')?></td>
        <td><?php echo Form::input('nim', $nim);?></td>
    </tr>
    <tr>
        <td><?php echo Form::label('username', 'Username')?></td>
        <td><?php echo Form::input('username', $username);?></td>
    </tr>
    <tr>
        <td><?php echo Form::label('nama', 'Nama')?></td>
        <td><?php echo Form::input('nama', $nama);?></td>
    </tr>
    <tr>
        <td><?php echo Form::label('tempat_lahir', 'Tempat Lahir')?></td>
        <td><?php echo Form::input('tempat_lahir', $tempat_lahir);?></td>
    </tr>
    <tr>
        <td><?php echo Form::label('email', 'Email');?></td>
        <td><?php echo Form::input('email', $email);?></td>
    </tr>
    <tr>
        <td><?php echo Form::label('alamat', 'Alamat')?></td>
        <td><?php echo Form::input('alamat', $alamat);?></td>
    </tr>
    <tr>
        <td><?php echo Form::label('no_hp', 'Nomor Handphone')?></td>
        <td><?php echo Form::input('no_hp', $no_hp);?></td>
    </tr>
    <tr>
        <td><?php echo Form::label('nama_ayah', 'Nama Ayah')?></td>
        <td><?php echo Form::input('nama_ayah', $nama_ayah);?></td>
    </tr>

    <tr>
        <td><?php echo Form::label('telp_rumah', 'Telepon Rumah')?></td>
        <td><?php  echo Form::input('telp_rumah', $telp_rumah);?></td>
    </tr>
    <tr>
        <td><?php echo Form::label('tahun_masuk', 'Tahun Masuk')?></td>
        <td><?php echo Form::input('tahun_masuk', $tahun_masuk);?></td>
    </tr>
    <tr>
        <td><?php echo Form::label('status_kelulusan', 'Status Kelulusan')?></td>
        <td><?php echo Form::input('status_kelulusan', $status_kelulusan);?></td>
    </tr>
</table>
<?php
echo Form::close();
?>