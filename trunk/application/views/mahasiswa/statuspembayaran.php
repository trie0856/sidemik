<fieldset style="width: 300px; margin-left: auto; margin-right: auto;">
    <legend>Status Pembayaran</legend>
    <?php echo Form::open(NULL);?>
    <table border="1">
        <thead>
            <tr>
                <th>Semester</th>
                <th>Sudah Membayar</th>
            </tr>
        </thead>
        <tbody>
            <?php
            for ($i = 1; $i <= 6; ++$i) :
            ?>
            <tr>
                <td><?php echo $i;?></td>
                <td>
                    <?php
                    echo Form::checkbox("bayar[$i]", 1, (bool)  in_array($i, $bayar));
                    ?>
                </td>
            </tr>
            <?php endfor;?>
        </tbody>
    </table>
    <br />
    <?php echo Form::submit('simpan', 'Simpan')?>
    <?php echo Form::close();?>
</fieldset>