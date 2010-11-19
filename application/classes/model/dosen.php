<?php defined('SYSPATH') or die('No direct script access.');

class Model_Dosen extends ORM
{
    protected $_ignored_columns = array(
        'tanggal',
        'bulan',
        'tahun'
    );
    protected $_primary_key = 'nip';
    protected $_table_name = 'dosen';
}