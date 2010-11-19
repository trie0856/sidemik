add
<?php echo Form::open(NULL, array('method'=>'post'));?>
<table>
    <tr>
        <td><?php echo Form::label('nip', 'NIP')?></td>
        <td><?php echo Form::input('nip');?></td>
    </tr>
    <tr>
        <td><?php echo Form::label('password', 'Password')?></td>
        <td><?php echo Form::input('password');?></td>
    </tr>
    <tr>
        <td><?php echo Form::label('nama', 'Nama')?></td>
        <td><?php echo Form::input('nama');?></td>
    </tr>
    <tr>
        <?php
            $curyear = date('Y');
            $tahun_masuks = array();
            for ($i = 5; $i >= 0; --$i) {
                $tahun_masuks[$curyear-$i] = $curyear-$i;
            }

            for ($i = 0; $i <= 5; ++$i) {
                $tahun_masuks[$curyear+$i] = $curyear+$i;
            }
        ?>
        <td><?php echo Form::label('tahun_masuk', 'Tahun Masuk')?></td>
        <td><?php echo Form::select('tahun_masuk', $tahun_masuks, $curyear);?></td>
    </tr>
    <tr>
        <td><?php echo Form::label('tempat_lahir', 'Tempat Lahir')?></td>
        <td><?php echo Form::input('tempat_lahir');?></td>
    </tr>
    <tr>
        <td><?php echo Form::label('tanggal_lahir', 'Tanggal Lahir')?></td>
        <td><?php echo Form::input('tanggal_lahir');?></td>
    </tr>
    <tr>
        <td><?php echo Form::label('jenis_kelamin', 'Jenis Kelamin')?></td>
        <td><?php echo Form::select('jenis_kelamin', array('-1' => '', '0' => 'Wanita', '1' => 'Pria'));?></td>
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
        <td><?php echo Form::label('telp_rumah', 'Telepon Rumah')?></td>
        <td><?php  echo Form::input('telp_rumah');?></td>
    </tr>
    <tr>
        <td><?php echo Form::label('email', 'Email');?></td>
        <td><?php echo Form::input('email');?></td>
    </tr>

    <tr>
        <td><?php echo Form::button('tambah', 'Tambah')?></td>
        <td></td>
    </tr>
</table>
<?php echo Form::close(); ?>