<?php
for($i = 1; $i <=3; ++$i) {
    $ganjil = ($i-1) * 2 + 1;
    $genap  = $ganjil + 1;
?>
<table border="1" align="center">
    <thead>
        <tr>
            <th colspan="4" width="350">Semester <?php echo $ganjil;?></th>
            <th colspan="4" width="350">Semester <?php echo $genap;?></th>
        </tr>
        <tr>
            <th>Kode</th>
            <th>Nama Mata Kuliah</th>
            <th>SKS</th>
            <th>Nilai</th>
            <th>Kode</th>
            <th>Nama Mata Kuliah</th>
            <th>SKS</th>
            <th>Nilai</th>
        </tr>
    </thead>
    <?php
    $count_ganjil   = count($transkrip[$ganjil]);
    $count_genap    = count($transkrip[$genap]);
    $max            = max(array($count_ganjil, $count_genap));
    $t_ganjil       = $transkrip[$ganjil];
    $t_genap        = $transkrip[$genap];
    ?>
    <tbody>
        <?php
        for($j = 0; $j < $max; ++$j) {
        ?>
        <tr>
            <?php
            if (isset($t_ganjil[$j])) {
                foreach($t_ganjil[$j] as $row) {
                    echo "<td>" . $row . "</td>";
                }
            } else {
                for($k = 1; $k <= 4; ++$k) {
                    echo "<td>&nbsp;</td>";
                }
            }

            if (isset($t_genap[$j])) {
                foreach($t_genap[$j] as $row) {
                    echo "<td>" . $row . "</td>";
                }
            } else {
                for($k = 1; $k <= 4; ++$k) {
                    echo "<td>&nbsp;</td>";
                }
            }
            ?>
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>
<?php
}
?>