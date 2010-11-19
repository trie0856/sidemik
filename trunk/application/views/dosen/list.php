<?php echo HTML::anchor('Dosen/add', 'Tambah Dosen')?>
<table border="1">
    <thead>
        <tr>
            <th>No</th>
            <th width="100">NIP</th>
            <th width="200">Nama</th>
            <th>Keterangan</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        foreach ($dosens as $dosen) {
        ?>
            <tr>
                <td><?php echo $no?></td>
                <td><?php echo $dosen->nip?></td>
                <td><?php echo Html::anchor("/dosen/profil/$dosen->nip",$dosen->nama);?></td>
                <td><?php echo Html::anchor("/dosen/edit/$dosen->nip",'Edit');?></td>
            </tr>
        <?php
        ++$no;
        }
        ?>
    </tbody>
</table>