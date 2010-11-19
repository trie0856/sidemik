<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Dosen extends Controller_Website {

    public $auth_required = 'login';
    public $secure_actions = array(
        'add'       => 'admin',
        'delete'    => 'admin',
        'list'      => array('admin', 'tata_usaha'),
    );
    
    public function before() {
        parent::before();
    }
    
    public function after() {
        parent::after();
    }

    public function action_index() {
        $this->template->title = "Dosen";
    }

    public function action_list() {
        $this->template->title = "List Dosen";
    }

    public function action_add() {
        $this->template->title = "Add Dosen";
    }

    public function action_edit() {
        $this->template->title = "Edit Dosen";
    }

    public function action_delete() {
        $this->template->title = "Delete Dosen";
    }

} // End Dosen
