<h2>Kurikulum</h2>
<?php
for ($tingkat = 1; $tingkat<=3; ++$tingkat) {
$mk_per_tingkat = $kurikulum[$tingkat];
?>
<table border="1">
    <thead>
        <tr>
            <th colspan="3" width="350">Semester <?php echo ($tingkat-1)*2 + 1;?></th>
            <th colspan="3" width="350">Semester <?php echo ($tingkat-1)*2 + 2;?></th>
        </tr>
        <tr>
            <th>Kode</th>
            <th>Nama Matakuliah</th>
            <th>SKS</th>
            <th>Kode</th>
            <th>Nama Matakuliah</th>
            <th>SKS</th>
        </tr>
    </thead>
    <?php
    $mk_1;
    $mk_2;
    $count_1;
    $count_2;
    if (isset ($mk_per_tingkat[1])) {
        $mk_1 = $mk_per_tingkat[1];
        $count_1 = count($mk_per_tingkat[1]);
    } else {
        $count_1 = 0;
    }

    if (isset($mk_per_tingkat[2])) {
        $mk_2 = $mk_per_tingkat[2];
        $count_2 = count($mk_per_tingkat[2]);
    } else {
        $count_2 = 0;
    }
    
    $max = max(array($count_1, $count_2));
    ?>
    
    <?php
    for ($i=0; $i<$max; ++$i) {
    ?>
    <tr>
        <?php if(isset ($mk_1[$i])) { ?>
        <td><?php echo $mk_1[$i]->kode ?></td>
        <td><?php echo $mk_1[$i]->nama ?></td>
        <td><?php echo $mk_1[$i]->jumlah_sks ?></td>
        <?php
        } else {
        ?>
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
        <?php
        } else {
        ?>
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