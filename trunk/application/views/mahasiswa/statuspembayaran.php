<h2>Status Pembayaran</h2>
    <?php echo Form::open(NULL);?>
    <table class="sidemik_table">
        <thead>
            <tr>
                <td>Semester</td>
                <td>Sudah Membayar</td>
            </tr>
        </thead>
        <tbody style="text-align: center;">
            <?php
            for ($i = 1; $i <= 6; ++$i) :
            ?>
            <tr <?php if ($i % 2 == 0) echo "class='gray'"?>>
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
    <?php echo Form::button('simpan', 'Simpan')?>
    <?php echo Form::close();?>