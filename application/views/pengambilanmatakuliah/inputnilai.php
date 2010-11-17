<?php echo Form::open(NULL, array('method' => 'post'))?>
<fieldset>
    <legend>Pilih Matakuliah dan Tahun</legend>
    <table>
        <tr>
            <td>Mata Kuliah</td>
            <td><?php echo Form::select('matakuliah', $list_matakuliah, $selected_matakuliah)?></td>
        </tr>
        <tr>
            <td>Tahun</td>
            <td><?php echo Form::select('tahun', $list_tahun, $selected_tahun)?></td>
        </tr>
        <tr>
            <td>Semester</td>
            <td>
                <?php
                $list_semester = array(
                    '0' => ' ',
                    '1' => 'Ganjil',
                    '2' => 'Genap'
                );
                echo Form::select('semester', $list_semester, $selected_semester);
                ?>
            </td>
        </tr>
        <tr>
            <td colspan="2"><?php echo Form::submit('pilih', 'Pilih') ?></td>
        </tr>
    </table>
</fieldset>
<?php echo Form::close()?>


<?php
if (count($list_input_nilai) > 0) {
echo Form::open(NULL, array('method' => 'post'));
?>
<fieldset>
    <legend>
        <?php echo $list_matakuliah[$selected_matakuliah] . " - " . 
        $selected_tahun . " - Semeter " . $list_semester[$selected_semester];
        ?>
    </legend>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>NIM</th>
                <th>Nama Mahasiswa</th>
                <th>Nilai</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <td colspan="4"><?php echo Form::submit('simpan', 'Simpan')?></td>
            </tr>
        </tfoot>
        <tbody>
            <?php
            $no = 0;
            foreach ($list_input_nilai as $lin) {
            ++$no;
            ?>
            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $lin['nim']; ?></td>
                <td><?php echo $lin['nama']; ?></td>
                <td>
                <?php
                $list_nilai = array (
                    '0' => ' ',
                    'A' => 'A',
                    'B' => 'B',
                    'C' => 'C',
                    'D' => 'D',
                    'E' => 'E',
                );
                echo Form::select('nilai['.$lin['nim'].']', $list_nilai, $lin['nilai']);
                ?>
                </td>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</fieldset>
<?php
echo Form::close();
}
?>