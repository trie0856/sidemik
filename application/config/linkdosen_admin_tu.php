<?php defined('SYSPATH') or die ('No direct script access.');

// Link untuk tambahan untuk admin dan tata usaha jika mengakses dosen
return array (
    'dosen/profil'                      => array (
        'title'     => 'Profil',
        'show'      => TRUE,
        'role'      => array('admin', 'tata_usaha')
    ),
    'dosen/edit'                        => array (
        'title'     => 'Edit Profil',
        'show'      => FALSE,
        'role'      => array('admin')
    ),
    'jadwal/mengajar'                   => array (
        'title'     => 'Jadwal Mengajar',
        'show'      => TRUE,
        'role'      => array('admin', 'tata_usaha')
    ),
    'dosen/jadwalkosong'                => array (
        'title'     => 'Jadwal Kosong',
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
