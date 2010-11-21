<h2>Pengambilan Mata Kuliah</h2>

<?php
$semester_ambils = array();
$semester_ambil = 2;
for ($i = 1; $i < 9; ++$i) {
    $semester_ambils[$i] = $i;
}
?>

<?php echo Form::open(NULL, array('method' => 'post'))?>
<table style="font-weight: bold">
    <tr>
        <td>NIM</td>
        <td>:</td>
        <td><?php echo $mahasiswa->nim; ?></td>
    </tr>
    <tr>
        <td>Nama</td>
        <td>:</td>
        <td><?php echo $mahasiswa->nama; ?></td>
    </tr>
</table>
<br />
<table align="center">
    <tr>
        <td>Semester&nbsp;</td>
        <td width="100"><?php echo Form::select('semester_ambil', $semester_ambils, Sidemik::getSemester($mahasiswa->nim));?></td>
    </tr>
</table>
<br />
<?php
for ($tingkat = 1; $tingkat<=3; ++$tingkat) {
$mk_per_tingkat = $kurikulum[$tingkat];
?>
<table class="sidemik_table" align="center">
    <thead>
        <tr class="pink_gelap">
            <td colspan="4" width="375">Semester <?php echo ($tingkat-1)*2 + 1;?></td>
            <td colspan="4" width="375">Semester <?php echo ($tingkat-1)*2 + 2;?></td>
        </tr>
        <tr>
            <td>Kode</td>
            <td>Nama Matakuliah</td>
            <td>SKS</td>
            <td>Ambil</td>
            <td>Kode</td>
            <td>Nama Matakuliah</td>
            <td>SKS</td>
            <td>Ambil</td>
        </tr>
    </thead>
    
   <?php
    $mk_1; $mk_2; $count_1; $count_2;
    
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
    <tr <?php if (($i+1) % 2 == 0) echo "class = 'gray' "?> >
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
<?php echo Form::button('submit', 'Ambil', array('style' => 'margin-left : 360px;')) ?>
<?php echo Form::close(); ?>