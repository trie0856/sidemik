<?php echo HTML::anchor('mahasiswa/add', 'Tambah Mahasiswa', array('class' => 'button'))?>
<br />
<table class="sidemik_table">
    <thead>
        <tr>
            <td>No</td>
            <td width="100">NIM</td>
            <td width="200">Nama</td>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        foreach ($mahasiswas as $mahasiswa) {
        ?>
            <tr <?php if ($no % 2 == 0) echo "class=gray" ?>>
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