<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Statistik extends Controller_Website {
    
    public function before() {
        parent::before();
    }
    
    public function after() {
        parent::after();
    }

    public function action_index() {
        $this->template->title = "Statistik";
    }

} // End Statistik
