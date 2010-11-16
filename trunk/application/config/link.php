<?php defined('SYSPATH') or die ('No direct script access.');
return array
(
    'Daftar Mahasiswa'      => array (
        'link'      => 'mahasiswa/list',
        'role'      => array('admin', 'tata_usaha')
    ),
    'Daftar Matakuliah'     => array (
        'link'      => 'matakuliah/list',
        'role'      => array('admin', 'tata_usaha')
    ),
    'Daftar Dosen'          => array (
        'link'      => 'dosen/list',
        'role'      => array('admin', 'tata_usaha')
    ),

    'Profil Dosen'          => array (
        'link'      => 'dosen/view',
        'role'      => array('dosen')
    ),
    'Input Nilai'           => array (
        'link'      => 'pengambilanmatakuliah/inputnilai',
        'role'      => array('dosen', 'admin')
    ),
    'Jadwal Mengajar'       => array (
        'link'      => 'dosen/jawdalmengajar',
        'role'      => array('dosen')
    ),
    'Jadwal Kosong'         => array (
        'link'      => 'dosen/jadwalkosong',
        'role'      => array('dosen')
    ),

    'Profil Mahasiswa'      => array (
        'link'      => 'mahasiswa/view',
        'role'      => array('mahasiswa')
    ),
    'KSM'                   => array (
        'link'      => 'pengambilanmatakuliah/ksm',
        'role'      => array('mahasiswa')
    ),
    'Transkrip Akademik'    => array (
        'link'      => 'pengambilanmatakuliah/transkrip',
        'role'      => array('mahasiswa')
    ),
    'Jadwal Kuliah'      => array (
        'link'      => 'pengambilanmatakuliah/jadwalkuliah',
        'role'      => array('mahasiswa')
    ),

    'Kurikulum'             => array (
        'link'      => 'matakuliah/kurikulum',
        'role'      => array('login')
    ),
    'Statistik'             => array (
        'link'      => 'statistik',
        'role'      => array('admin', 'dosen', 'tata_usaha')
    ),
    'Ubah Password'         => array (
        'link'      => 'user/edit',
        'role'      => array('login')
    )
);
?>