<?php echo HTML::anchor('mahasiswa/add', 'Tambah Mahasiswa')?>
<table border="1">
    <thead>
        <tr>
            <th>No</th>
            <th width="100">NIM</th>
            <th width="200">Nama</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        foreach ($mahasiswas as $mahasiswa) {
        ?>
            <tr>
                <td><?php echo $no?></td>
                <td><?php echo $mahasiswa->nim?></td>
                <td><?php echo Html::anchor("/mahasiswa/profil/$mahasiswa->nim",$mahasiswa->nama);?></td>
            </tr>
        <?php
        ++$no;
        }
        ?>
    </tbody>
</table>