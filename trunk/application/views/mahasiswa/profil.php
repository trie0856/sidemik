profil
<table>
    <tr>
        <td><?php echo 'NIM'?></td>
        <td><?php echo $mahasiswa->nim;?></td>
    </tr>
    <tr>
        <td><?php echo 'Nama'?></td>
        <td><?php echo $mahasiswa->nama;?></td>
    </tr>
    <tr>
        <td><?php echo 'Tempat Lahir';?></td>
        <td><?php echo $mahasiswa->tempat_lahir;?></td>
    </tr>
    <tr>
        <td><?php echo 'Tanggal Lahir';?></td>
        <td><?php echo $mahasiswa->tanggal_lahir;?></td>
    </tr>
    <tr>
        <td><?php echo 'Jenis Kelamin';?></td>
        <td><?php echo $referensi_jenis_kelamin[$mahasiswa->jenis_kelamin];?></td>
    </tr>
    <tr>
        <td><?php echo 'Email';?></td>
        <td><?php echo $mahasiswa->email;?></td>
    </tr>
    <tr>
        <td><?php echo 'Alamat';?></td>
        <td><?php echo $mahasiswa->alamat;?></td>
    </tr>
    <tr>
        <td><?php echo 'Nomor Handphone';?></td>
        <td><?php echo $mahasiswa->no_hp;?></td>
    </tr>
    <tr>
        <td><?php echo 'Nama Ayah';?></td>
        <td><?php echo $mahasiswa->nama_ayah;?></td>
    </tr>

    <tr>
        <td><?php echo 'Telepon Rumah';?></td>
        <td><?php echo $mahasiswa->telp_rumah;?></td>
    </tr>
    <tr>
        <td><?php echo 'Tahun Masuk';?></td>
        <td><?php echo $mahasiswa->tahun_masuk;?></td>
    </tr>
</table>