<?php echo HTML::anchor('matakuliah/add', 'Tambah Matakuliah', array('class' => 'button'))?>
<br />
<table class="sidemik_table">
    <thead>
        <tr>
            <td width="40">No</td>
            <td width="90">Kode</td>
            <td width="200">Nama Mata Kuliah</td>
            <td>Tingkat</td>
            <td>Semester Buka</td>
            <td>Jumlah SKS</td>
            <td>Keterangan</td>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        foreach ($matakuliahs as $matakuliah) {
        ?>
            <tr <?php if ($no % 2 == 0) echo "class=gray" ?>>
                <td><?php echo $no?></td>
                <td><?php echo $matakuliah->kode;?></td>
                <td><?php echo Html::anchor("/matakuliah/view/$matakuliah->kode",$matakuliah->nama);?></td>
                <td><?php echo $matakuliah->tingkat;?></td>
                <td>
                    <?php
                    $semester = $matakuliah->semester_buka;
                    if ($semester == 1) {
                        echo "Ganjil";
                    } else if ($semester == 2) {
                        echo "Genap";
                    } else {
                        echo "Ganjil dan Genap";
                    }
                    ?>
                </td>
                <td><?php echo $matakuliah->jumlah_sks;?></td>
                <td><?php echo Html::anchor("/matakuliah/edit/$matakuliah->kode",'Edit');?></td>
            </tr>
        <?php
        ++$no;
        }
        ?>
    </tbody>
</table>