<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Front extends Controller_Website {

   public $secure_actions = array('index' => array('login'));

    public function before() {
        $this->template = 'template/one_column';
        parent::before();
    }
    
    public function after() {
        parent::after();
    }

    public function action_index() {
        $this->template->title = "Front";
        Request::instance()->redirect('mahasiswa');
    }

} // End Front
