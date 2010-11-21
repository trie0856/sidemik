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

<h3>Tambah Mahasiswa</h3>
<?php echo Form::open(NULL, array('method'=>'post', 'id' => 'add_mahasiswa_form', 'class' => 'cmxform'));?>
<table>
    <tr>
        <td width="170"><?php echo Form::label('nim', 'NIM')?></td>
        <td>
        <?php echo Form::input('nim', NULL, array('class' => 'required number'));?>
        </td>
    </tr>
    <tr>
        <td><?php echo Form::label('password', 'Password')?></td>
        <td><?php echo Form::password('password', NULL, array('class' => 'required', 'id' => 'password'));?></td>
    </tr>
    <tr>
        <td><?php echo Form::label('konfirmasi_password', 'Konfirmasi Password')?></td>
        <td><?php echo Form::password('konfirmasi_password', NULL, array('id' => 'konfirmasi_password'));?></td>
    </tr>
    <tr>
        <td><?php echo Form::label('nama', 'Nama')?></td>
        <td><?php echo Form::input('nama', NULL, array('class' => 'required'));?></td>
    </tr>
    <tr>
        <td><?php echo Form::label('tempat_lahir', 'Tempat Lahir')?></td>
        <td><?php echo Form::input('tempat_lahir', NULL, array('class' => 'required'));?></td>
    </tr>
    <tr>
        <td><?php echo Form::label('tanggal_lahir', 'Tanggal Lahir')?></td>
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
        
        echo Form::select('tanggal', $date, NULL, array('class' => 'required'));
        echo Form::select('bulan', $month, NULL, array('class' => 'required'));
        echo Form::select('tahun', $year, NULL, array('class' => 'required'));
        ?>
        </td>
    </tr>
    <tr>
        <td><?php echo Form::label('jenis_kelamin', 'Jenis Kelamin')?></td>
        <td><?php echo Form::select('jenis_kelamin', array('' => '', '0' => 'Wanita', '1' => 'Pria'), NULL, array('class' => 'required')); ?></td>
    </tr>
    <tr>
        <td><?php echo Form::label('email', 'Email');?></td>
        <td><?php echo Form::input('email', NULL, array('class' => 'email'));?></td>
    </tr>
    <tr>
        <td><?php echo Form::label('alamat', 'Alamat')?></td>
        <td><?php echo Form::input('alamat', NULL, array('class' => 'required'));?></td>
    </tr>
    <tr>
        <td><?php echo Form::label('no_hp', 'Nomor Handphone')?></td>
        <td><?php echo Form::input('no_hp');?></td>
    </tr>
    <tr>
        <td><?php echo Form::label('nama_ayah', 'Nama Ayah')?></td>
        <td><?php echo Form::input('nama_ayah', NULL, array('class' => 'required'));?></td>
    </tr>

    <tr>
        <td><?php echo Form::label('telp_rumah', 'Telepon Rumah')?></td>
        <td><?php  echo Form::input('telp_rumah');?></td>
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
        <td><?php echo Form::button('tambah', 'Tambah')?></td>
        <td></td>
    </tr>
</table>
<?php echo Form::close(); ?>