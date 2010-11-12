<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Matakuliah extends Controller_Website {
    
    public function before() {
        parent::before();
    }
    
    public function after() {
        parent::after();
    }

    public function action_index() {
        $this->template->title = "Matakuliah";
    }

    public function action_list() {
        $this->template->title = "List Matakuliah";
    }

    public function action_add() {
        $this->template->title = "Add Matakuliah";
    }

    public function action_edit() {
        $this->template->title = "Edit Matakuliah";
    }

    public function action_delete() {
        $this->template->title = "Delete Matakuliah";
    }

} // End Matakuliah
