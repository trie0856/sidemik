<?php echo HTML::anchor('Dosen/add', 'Tambah Dosen', array('class' => 'button'))?>
<br />
<table class="sidemik_table">
    <thead>
        <tr>
            <td>No</td>
            <td width="100">NIP</td>
            <td width="200">Nama</td>
            <td>Keterangan</td>
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
                <td><?php echo Html::anchor("/dosen/profil/$dosen->nip",$dosen->nama);?></td>
                <td><?php echo Html::anchor("/dosen/edit/$dosen->nip",'Edit');?></td>
            </tr>
        <?php
        ++$no;
        }
        ?>
    </tbody>
</table>