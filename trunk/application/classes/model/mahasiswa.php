<?php defined('SYSPATH') or die('No direct script access.');

class Model_Mahasiswa extends ORM
{
    protected $_ignored_columns = array(
        'tanggal',
        'bulan',
        'tahun',
        'ipk',
        'semester'
    );
    protected $_primary_key = 'nim';
    protected $_table_name = 'mahasiswa';
}