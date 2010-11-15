<?php echo HTML::anchor('matakuliah/add', 'Tambah Matakuliah')?>
<table border="1">
    <thead>
        <tr>
            <th>No</th>
            <th width="100">Kode</th>
            <th width="200">Nama Mata Kuliah</th>
            <th>Jumlah SKS</th>
            <th>Keterangan</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        foreach ($matakuliahs as $matakuliah) {
        ?>
            <tr>
                <td><?php echo $no?></td>
                <td><?php echo $matakuliah->kode;?></td>
                <td><?php echo Html::anchor("/matakuliah/view/$matakuliah->kode",$matakuliah->nama);?></td>
                <td><?php echo $matakuliah->jumlah_sks;?></td>
                <td><?php echo Html::anchor("/matakuliah/edit/$matakuliah->kode",'Edit');?></td>
            </tr>
        <?php
        ++$no;
        }
        ?>
    </tbody>
</table>