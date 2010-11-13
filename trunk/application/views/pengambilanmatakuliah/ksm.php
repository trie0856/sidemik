KSM
<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Kode</th>
            <th>Mata Kuliah</th>
            <th>SKS</th>
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