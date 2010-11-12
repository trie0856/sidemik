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

    public function action_list() {
        $this->template->title = "List Mahasiswa";
    }

    public function action_add() {
        $this->template->title = "Add Mahasiswa";
        $nim = "";
        $username = "";
        $nama = "";
        $tempat_lahir = "";
        $tanggal_lahir = "";
    }

    public function action_edit() {
        $this->template->title = "Edit Mahasiswa";
        $nim = "";
        $username = "";
        $nama = "";
        $tempat_lahir = "";
        $tanggal_lahir = "";
    }

    public function action_delete() {
        $this->template->title = "Delete Mahasiswa";
    }

} // End Mahasiswa
