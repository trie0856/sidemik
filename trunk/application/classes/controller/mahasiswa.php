<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Mahasiswa extends Controller_Website {
    
    public function before() {
        parent::before();
    }
    
    public function after() {
        parent::after();
    }

    public function action_index() {
        $this->template->title = "Mahasiswa";
    }

} // End Welcome
