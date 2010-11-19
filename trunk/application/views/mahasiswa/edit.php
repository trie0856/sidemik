<?php echo Form::open(NULL, array('method'=>'post'));?>
<table>
    <tr>
        <td><?php echo 'NIM';?></td>
        <td width="10">:</td>
        <td><?php echo $mahasiswa->nim;?></td>
    </tr>
    <tr>
        <td><?php echo Form::label('nama', 'Nama')?></td>
        <td>:</td>
        <td><?php echo Form::input('nama', $mahasiswa->nama);?></td>
    </tr>
    <tr>
        <td><?php echo Form::label('tempat_lahir', 'Tempat Lahir')?></td>
        <td>:</td>
        <td><?php echo Form::input('tempat_lahir', $mahasiswa->tempat_lahir);?></td>
    </tr>
    <tr>
        <td><?php echo Form::label('tanggal_lahir', 'Tanggal Lahir')?></td>
        <td>:</td>
        <td>
        <?php
        $date = array();
        $date[0] = " ";
        for ($i = 1; $i <= 31; ++$i) {
            $date[$i] = $i;
        }

        $month = array(
            " ",
            "Januari",
            "Februari",
            "Maret",
            "April",
            "Mei",
            "Juni",
            "Juli",
            "Agustus",
            "September",
            "Oktober",
            "November",
            "Desember"
        );

        $year = array();
        $year[0] = " ";
        for ($i = 1980; $i < date('Y'); ++$i) {
            $year[$i] = $i;
        }

        echo Form::select('tanggal', $date, $mahasiswa->tanggal);
        echo Form::select('bulan', $month, $mahasiswa->bulan);
        echo Form::select('tahun', $year, $mahasiswa->tahun);
        ?>
        </td>
    </tr>
    <tr>
        <td><?php echo Form::label('jenis_kelamin', 'Jenis Kelamin')?></td>
        <td>:</td>
        <td><?php echo Form::select('jenis_kelamin', array('-1' => '', '0' => 'Wanita', '1' => 'Pria'), $mahasiswa->jenis_kelamin);?></td>
    </tr>
    <tr>
        <td><?php echo Form::label('email', 'Email');?></td>
        <td>:</td>
        <td><?php echo Form::input('email', $mahasiswa->email);?></td>
    </tr>
    <tr>
        <td><?php echo Form::label('alamat', 'Alamat')?></td>
        <td>:</td>
        <td><?php echo Form::input('alamat', $mahasiswa->alamat);?></td>
    </tr>
    <tr>
        <td><?php echo Form::label('no_hp', 'Nomor Handphone')?></td>
        <td>:</td>
        <td><?php echo Form::input('no_hp', $mahasiswa->no_hp);?></td>
    </tr>
    <tr>
        <td><?php echo Form::label('nama_ayah', 'Nama Ayah')?></td>
        <td>:</td>
        <td><?php echo Form::input('nama_ayah', $mahasiswa->nama_ayah);?></td>
    </tr>

    <tr>
        <td><?php echo Form::label('telp_rumah', 'Telepon Rumah')?></td>
        <td>:</td>
        <td><?php  echo Form::input('telp_rumah', $mahasiswa->telp_rumah);?></td>
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
        <td>:</td>
        <td><?php echo Form::select('tahun_masuk', $tahun_masuks, $mahasiswa->tahun_masuk);?></td>
    </tr>
    <tr>
        <td><?php echo Form::button('ubah', 'Ubah')?></td>
        <td></td>
    </tr>
</table>
<?php echo Form::close(); ?>