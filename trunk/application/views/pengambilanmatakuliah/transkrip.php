<h2>Transkrip Mahasiswa</h2>

<table style="font-weight: bold">
    <tr>
        <td width="120">NIM</td>
        <td>:</td>
        <td><?php echo $mahasiswa->nim;?></td>
    </tr>
    <tr>
        <td>Nama</td>
        <td>:</td>
        <td><?php echo $mahasiswa->nama;?></td>
    </tr>
    <tr>
        <td>IPK / SKS</td>
        <td>:</td>
        <td><?php echo Sidemik::calculateIPK($mahasiswa->nim) . " / " . $total_sks;?></td>
    </tr>
</table>
<br />
<?php
for($i = 1; $i <=$batas; ++$i) {
$jum_sks = 0;
?>
<table border="1">
    <thead>
        <tr>
            <th colspan="4" width="350">Semester <?php echo $i;?></th>
        </tr>
        <tr>
            <th width="70">Kode</th>
            <th width="250">Nama Mata Kuliah</th>
            <th width="70">SKS</th>
            <th width="70">Nilai</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach($transkrip[$i] as $row) {
        ?>
        <tr>
            <?php
            $jum_sks += $row['sks'];
            foreach($row as $td) {
                echo "<td>$td</td>";
            }
            ?>
        </tr>
        <?php
        }
        ?>
    </tbody>
    <tfoot>
        <tr>
            <th align="left" colspan="4">IP / SKS : <?php echo Sidemik::calculateIP($mahasiswa->nim, $i) . " / " . $jum_sks ?></th>
        </tr>
    </tfoot>
</table>
<br />
<?php
}
?>