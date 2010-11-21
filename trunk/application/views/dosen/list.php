<h2>Daftar Dosen</h2>

<?php echo HTML::anchor('Dosen/add', 'Tambah Dosen', array('class' => 'button'))?>
<br />
<table class="sidemik_table">
    <thead>
        <tr>
            <td>No</td>
            <td>NIP</td>
            <td>Nama</td>
            <td>Aksi</td>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        foreach ($dosens as $dosen) {
        ?>
            <tr <?php if ($no % 2 == 0) echo "class=gray" ?>>
                <td><?php echo $no?></td>
                <td><?php echo $dosen->nip?></td>
                <td><?php echo $dosen->nama;?></td>
                <td>
                    <?php echo Html::anchor("/dosen/profil/$dosen->nip","Lihat");?>
                    &nbsp;
                    <?php echo Html::anchor("/dosen/edit/$dosen->nip","Edit");?>
                    &nbsp;
                    <?php echo Html::anchor("/dosen/delete/$dosen->nip","Hapus", array('onclick' => 'return konfirmasi_hapus()'));?>
                </td>
            </tr>
        <?php
        ++$no;
        }
        ?>
    </tbody>
</table>