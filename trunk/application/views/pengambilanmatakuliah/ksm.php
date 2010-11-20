<table>
    <tr>
        <th colspan="3" align="left">Kartu Studi Mahasiswa</th>
    </tr>
    <tbody>
    <tr>
        <td width="100">NIM</td>
        <td> : </td>
        <td><?php echo $mahasiswa->nim;?></td>
    </tr>
    <tr>
        <td>Nama</td>
        <td> : </td>
        <td><?php echo $mahasiswa->nama;?></td>
    </tr>
    <tr>
        <td>Semester</td>
        <td> : </td>
        <td><?php echo $semester;?></td>
    </tr>
    </tbody>
</table>
<br />
<table border="1">
    <thead>
        <tr>
            <th width="50">No</th>
            <th width="70">Kode</th>
            <th width="300">Mata Kuliah</th>
            <th width="70">SKS</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        foreach($matakuliahs as $matakuliah) {
        ?>
        <tr>
            <td><?php echo $no;?></td>
            <td><?php echo $matakuliah->kode; ?></td>
            <td><?php echo $matakuliah->nama; ?></td>
            <td><?php echo $matakuliah->jumlah_sks; ?></td>
        </tr>
        <?php 
        ++$no;
        } ?>
    </tbody>
</table>