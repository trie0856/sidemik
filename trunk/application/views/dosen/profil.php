<table>
    <tr>
        <td width="170"><?php echo 'NIP'?></td>
        <td width="10">:</td>
        <td><?php echo $dosen->nip;?></td>
    </tr>
    <tr>
        <td><?php echo 'Nama'?></td>
        <td>:</td>
        <td><?php echo $dosen->nama;?></td>
    </tr>
    <tr>
        <td><?php echo 'Tahun Masuk';?></td>
        <td>:</td>
        <td><?php echo $dosen->tahun_masuk;?></td>
    </tr>
    <tr>
        <td><?php echo 'Tempat Lahir';?></td>
        <td>:</td>
        <td><?php echo $dosen->tempat_lahir;?></td>
    </tr>
    <tr>
        <td><?php echo 'Tanggal Lahir';?></td>
        <td>:</td>
        <td>
        <?php
       $month = array(
            "00" => " ",
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
        $result = explode('-', $dosen->tanggal_lahir);
        echo $result[2] . " " . $month[$result[1]] . " " . $result[0];
        ?>
        </td>
    </tr>
    <tr>
        <td><?php echo 'Jenis Kelamin';?></td>
        <td>:</td>
        <td><?php echo $referensi_jenis_kelamin[$dosen->jenis_kelamin];?></td>
    </tr>
    <tr>
        <td><?php echo 'Alamat';?></td>
        <td>:</td>
        <td><?php echo $dosen->alamat;?></td>
    </tr>
    <tr>
        <td><?php echo 'Nomor Handphone';?></td>
        <td>:</td>
        <td><?php echo $dosen->no_hp;?></td>
    </tr>
    <tr>
        <td><?php echo 'Telepon Rumah';?></td>
        <td>:</td>
        <td><?php echo $dosen->telp_rumah;?></td>
    </tr>
    <tr>
        <td><?php echo 'Email';?></td>
        <td>:</td>
        <td><?php echo $dosen->email;?></td>
    </tr>
</table>