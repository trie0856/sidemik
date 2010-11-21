<h2>Daftar Mahasiswa</h2>

<?php echo HTML::anchor('mahasiswa/add', 'Tambah Mahasiswa', array('class' => 'button'))?>
<br />
<table class="sidemik_table">
    <thead>
        <tr>
            <td>No</td>
            <td>NIM</td>
            <td>Nama</td>
            <td>Aksi</td>
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
                <td><?php echo $mahasiswa->nama;?></td>
                <td>
                    <?php echo Html::anchor("/mahasiswa/profil/$mahasiswa->nim","Lihat");?>
                    &nbsp;
                    <?php echo Html::anchor("/mahasiswa/edit/$mahasiswa->nim","Edit");?>
                    &nbsp;
                    <?php echo Html::anchor("/mahasiswa/delete/$mahasiswa->nim","Hapus", array('onclick' => 'return konfirmasi_hapus()'));?>
                </td>
            </tr>
        <?php
        ++$no;
        }
        ?>
    </tbody>
</table>