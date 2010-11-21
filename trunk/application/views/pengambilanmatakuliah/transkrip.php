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
<table class="sidemik_table">
    <thead>
        <tr>
            <td colspan="4" width="350">Semester <?php echo $i;?></td>
        </tr>
        <tr>
            <td width="70">Kode</td>
            <td width="250">Nama Mata Kuliah</td>
            <td width="70">SKS</td>
            <td width="70">Nilai</td>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 0;
        foreach($transkrip[$i] as $row) {
        ++$no;
        ?>
        <tr <?php if($no % 2 == 0) echo "class = 'gray' ";?> >
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
        <tr class="pink">
            <td align="left" colspan="4"><i><b>IP / SKS : <?php echo Sidemik::calculateIP($mahasiswa->nim, $i) . " / " . $jum_sks ?></b></i></td>
        </tr>
    </tfoot>
</table>
<br />
<br />
<?php
}
?>