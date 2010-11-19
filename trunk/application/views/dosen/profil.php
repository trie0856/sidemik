profil
<table>
    <tr>
        <td><?php echo 'NIP'?></td>
        <td><?php echo $dosen->nip;?></td>
    </tr>
    <tr>
        <td><?php echo 'Nama'?></td>
        <td><?php echo $dosen->nama;?></td>
    </tr>
    <tr>
        <td><?php echo 'Tahun Masuk';?></td>
        <td><?php echo $dosen->tahun_masuk;?></td>
    </tr>
    <tr>
        <td><?php echo 'Tempat Lahir';?></td>
        <td><?php echo $dosen->tempat_lahir;?></td>
    </tr>
    <tr>
        <td><?php echo 'Tanggal Lahir';?></td>
        <td><?php echo $dosen->tanggal_lahir;?></td>
    </tr>
    <tr>
        <td><?php echo 'Jenis Kelamin';?></td>
        <td><?php echo $referensi_jenis_kelamin[$dosen->jenis_kelamin];?></td>
    </tr>
    <tr>
        <td><?php echo 'Alamat';?></td>
        <td><?php echo $dosen->alamat;?></td>
    </tr>
    <tr>
        <td><?php echo 'Nomor Handphone';?></td>
        <td><?php echo $dosen->no_hp;?></td>
    </tr>
    <tr>
        <td><?php echo 'Telepon Rumah';?></td>
        <td><?php echo $dosen->telp_rumah;?></td>
    </tr>
    <tr>
        <td><?php echo 'Email';?></td>
        <td><?php echo $dosen->email;?></td>
    </tr>
</table>