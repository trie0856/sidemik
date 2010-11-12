add
<?php echo Form::open(NULL, array('method'=>'post'));?>
<table>
    <tr>
        <td><?php echo Form::label('kode', 'Kode')?></td>
        <td><?php echo Form::input('kode');?></td>
    </tr>
    <tr>
        <td><?php echo Form::label('nama', 'Nama Mata Kuliah')?></td>
        <td><?php echo Form::input('nama');?></td>
    </tr>
    <tr>
        <td><?php echo Form::label('deskripsi', 'Deskripsi')?></td>
        <td><?php echo Form::textarea('deskripsi');?></td>
    </tr>
    <tr>
        <td><?php echo Form::label('tingkat', 'Tingkat')?></td>
        <td><?php echo Form::select('tingkat', array('0'=>'','1'=>'1', '2'=>'2', '3'=>'3'));?></td>
    </tr>
    <tr>
        <td><?php echo Form::label('semester_buka', 'Semester Buka')?></td>
        <td><?php echo Form::select('semester_buka', array('0'=>'Semester ganjil dan genap','1'=>'Semester ganjil', '2'=>'Semester genap'));?></td>
    </tr>
    <tr>
        <td><?php echo Form::button('submit', 'Tambah')?></td>
        <td></td>
    </tr>
</table>
<?php echo Form::close(); ?>
