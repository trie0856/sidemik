<?php defined('SYSPATH') or die ('No direct script access.');

// Link untuk tambahan untuk admin dan tata usaha jika mengakses mahasiswa
return array (
    'mahasiswa/profil'                      => array (
        'title'     => 'Profil Mahasiswa',
        'show'      => TRUE,
        'role'      => array('admin', 'tata_usaha')
    ),
    'mahasiswa/edit'                        => array (
        'title'     => 'Edit Profile',
        'show'      => FALSE,
        'role'      => array('admin')
    ),
    'pengambilanmatakuliah/ksm'             => array (
        'title'     => 'KSM',
        'show'      => TRUE,
        'role'      => array('admin', 'tata_usaha')
    ),
    'pengambilanmatakuliah/ambil'           => array (
        'title'     => 'Ambil Mata Kuliah',
        'show'      => TRUE,
        'role'      => array('admin')
    ),
    'mahasiswa/statuspembayaran'            => array (
        'title'     => 'Status Pembayaran',
        'show'      => TRUE,
        'role'      => array('admin', 'tata_usaha')
    ),
    'pengambilanmatakuliah/transkrip'       => array (
        'title'     => 'Transkrip',
        'show'      => TRUE,
        'role'      => array('admin', 'tata_usaha')
    ),
    'jadwal/kuliah'                         => array (
        'title'     => 'Jadwal Kuliah',
        'show'      => TRUE,
        'role'      => array('admin', 'tata_usaha')
    ),
    'user/edit'                             => array (
        'title'     => 'Ubah password',
        'show'      => TRUE,
        'role'      => array('admin')
    ),
);
?>
