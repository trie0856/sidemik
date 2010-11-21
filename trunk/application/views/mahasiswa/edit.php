<script type="text/javascript">
    $(document).ready(function() {
        $("#edit_mahasiswa").validate();
    });
</script>
<h2>Edit Profil Mahasiswa</h2>
<?php echo Form::open(NULL, array('method'=>'post', 'id' => 'edit_mahasiswa'));?>
<fieldset>
    <legend>
        Informasi Akun
    </legend>
    <table>
        <tr>
            <td width="170"><?php echo 'NIM';?></td>
            <td width="10">:</td>
            <td><?php echo $mahasiswa->nim;?></td>
        </tr>
        <tr>
            <td><?php echo Form::label('nama', 'Nama')?></td>
            <td>:</td>
            <td><?php echo Form::input('nama', $mahasiswa->nama, array('class' => 'required'));?></td>
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
    </table>
</fieldset>
<br />
<fieldset>
    <legend>
        Informasi Pribadi
    </legend>
    <table>
        <tr>
            <td><?php echo Form::label('jenis_kelamin', 'Jenis Kelamin')?></td>
            <td>:</td>
            <td><?php echo Form::select('jenis_kelamin', array('' => '', '0' => 'Wanita', '1' => 'Pria'), $mahasiswa->jenis_kelamin, array('class' => 'required'));?></td>
        </tr>
        <tr>
            <td width="170"><?php echo Form::label('tempat_lahir', 'Tempat Lahir')?></td>
            <td>:</td>
            <td><?php echo Form::input('tempat_lahir', $mahasiswa->tempat_lahir, array('class' => 'required'));?></td>
        </tr>
        <tr>
            <td><?php echo Form::label('tanggal_lahir', 'Tanggal Lahir')?></td>
            <td>:</td>
            <td>
            <?php
            $date = array();
            $date[""] = " ";
            for ($i = 1; $i <= 31; ++$i) {
                $date[$i] = $i;
            }

            $month = array(
                "" => " ",
                "01" => "Januari",
                "02" => "Februari",
                "03" => "Maret",
                "04" => "April",
                "05" => "Mei",
                "06" => "Juni",
                "07" => "Juli",
                "08" => "Agustus",
                "09" => "September",
                "10" => "Oktober",
                "11" => "November",
                "12" => "Desember"
            );

            $year = array();
            $year[""] = " ";
            for ($i = 1980; $i < date('Y'); ++$i) {
                $year[$i] = $i;
            }

            echo Form::select('tanggal', $date, $mahasiswa->tanggal, array('class' => 'required'));
            echo Form::select('bulan', $month, $mahasiswa->bulan, array('class' => 'required'));
            echo Form::select('tahun', $year, $mahasiswa->tahun, array('class' => 'required'));
            ?>
            </td>
        </tr>
        <tr>
            <td><?php echo Form::label('nama_ayah', 'Nama Ayah')?></td>
            <td>:</td>
            <td><?php echo Form::input('nama_ayah', $mahasiswa->nama_ayah, array('class' => 'required'));?></td>
        </tr>
        <tr>
            <td><?php echo Form::label('email', 'Email');?></td>
            <td>:</td>
            <td><?php echo Form::input('email', $mahasiswa->email, array('class' => 'email'));?></td>
        </tr>
        <tr>
            <td><?php echo Form::label('alamat', 'Alamat Rumah')?></td>
            <td>:</td>
            <td><?php echo Form::input('alamat', $mahasiswa->alamat, array('class' => 'required'));?></td>
        </tr>
        <tr>
            <td><?php echo Form::label('no_hp', 'Nomor Handphone')?></td>
            <td>:</td>
            <td><?php echo Form::input('no_hp', $mahasiswa->no_hp);?></td>
        </tr>
        <tr>
            <td><?php echo Form::label('telp_rumah', 'Telepon Rumah')?></td>
            <td>:</td>
            <td><?php  echo Form::input('telp_rumah', $mahasiswa->telp_rumah);?></td>
        </tr>
        <tr>
            <td><?php echo Form::button('ubah', 'Ubah')?></td>
            <td></td>
        </tr>
    </table>
</fieldset>
<?php echo Form::close(); ?>