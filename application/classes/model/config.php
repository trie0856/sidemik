<?php defined('SYSPATH') or die('No direct script access.');

class Model_Config extends ORM
{
    protected $_primary_key = 'name';
    protected $_table_name = 'config';
}