<script type="text/javascript">
    $(document).ready(function() {
        $("#tambah_mk").validate();
    });
</script>

<h2>Tambah Mata Kuliah</h2>
<?php echo Form::open(NULL, array('method'=>'post', 'id' => 'tambah_mk'));?>
<table>
    <tr>
        <td width="150"><?php echo Form::label('kode', 'Kode')?></td>
        <td><?php echo Form::input('kode', NULL, array('class' => 'required'));?></td>
    </tr>
    <tr>
        <td><?php echo Form::label('nama', 'Nama Mata Kuliah')?></td>
        <td><?php echo Form::input('nama', NULL, array('class' => 'required'));?></td>
    </tr>
    <tr>
        <td><?php echo Form::label('jumlah_sks', 'Jumlah SKS')?></td>
        <td><?php echo Form::select('jumlah_sks', $select_jumlah_sks, NULL, array('class' => 'required'));?></td>
    </tr>
    <tr>
        <td><?php echo Form::label('deskripsi', 'Deskripsi')?></td>
        <td><?php echo Form::textarea('deskripsi');?></td>
    </tr>
    <tr>
        <td><?php echo Form::label('tingkat', 'Tingkat')?></td>
        <td><?php echo Form::select('tingkat', array(''=>' ','1'=>'1', '2'=>'2', '3'=>'3'), NULL, array('class' => 'required'));?></td>
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
