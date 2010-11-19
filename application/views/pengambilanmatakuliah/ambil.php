<?php
$semester_ambils = array();
$semester_ambil = 2;
for ($i = 1; $i < 9; ++$i) {
    $semester_ambils[$i] = $i;
}
?>

<?php echo Form::open(NULL, array('method' => 'post'))?>
<table align="center">
    <tr>
        <td>Semester</td>
        <td><?php echo Form::select('semester_ambil', $semester_ambils, 2);?></td>
    </tr>
</table>
<?php
for ($tingkat = 1; $tingkat<=3; ++$tingkat) {
$mk_per_tingkat = $kurikulum[$tingkat];
?>
<table border="1" align="center">
    <thead>
        <tr>
            <th colspan="4" width="350">Semester <?php echo ($tingkat-1)*2 + 1;?></th>
            <th colspan="4" width="350">Semester <?php echo ($tingkat-1)*2 + 2;?></th>
        </tr>
        <tr>
            <th>Kode</th>
            <th>Nama Matakuliah</th>
            <th>SKS</th>
            <th>Ambil</th>
            <th>Kode</th>
            <th>Nama Matakuliah</th>
            <th>SKS</th>
            <th>Ambil</th>
        </tr>
    </thead>
    
    <?php
    $count_1 = count($mk_per_tingkat[1]);
    $count_2 = count($mk_per_tingkat[2]);
    $max = max(array($count_1, $count_2));
    $mk_1 = $mk_per_tingkat[1];
    $mk_2 = $mk_per_tingkat[2];
    ?>
    <?php
    for ($i=0; $i<$max; ++$i) {
    ?>
    <tr>
        <?php if(isset ($mk_1[$i])) { ?>
        <td><?php echo $mk_1[$i]->kode ?></td>
        <td><?php echo $mk_1[$i]->nama ?></td>
        <td><?php echo $mk_1[$i]->jumlah_sks ?></td>
        <td><?php echo Form::checkbox("ambil[". $mk_1[$i]->kode . "]")?></td>
        <?php
        } else {
        ?>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <?php
        }
        ?>

       <?php if(isset ($mk_2[$i])) { ?>
        <td><?php echo $mk_2[$i]->kode ?></td>
        <td><?php echo $mk_2[$i]->nama ?></td>
        <td><?php echo $mk_2[$i]->jumlah_sks ?></td>
        <td><?php echo Form::checkbox("ambil[". $mk_2[$i]->kode . "]")?></td>
        <?php
        } else {
        ?>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <?php
        }
        ?>
    </tr>
    <?php
    }
    ?>
</table>
<br />
<?php
}
?>
<?php echo Form::submit('submit', 'Ambil') ?>
<?php echo Form::close(); ?>