<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Jadwal extends Controller_Website {
    
    public function before() {
        parent::before();
    }
    
    public function after() {
        parent::after();
    }

    public function action_index() {
        $this->template->title = "Jadwal";
    }

    public function action_input($kode = NULL) {
        $this->template->title = "Input Jadwal Kuliah";
    }

    public function action_kuliah($nim) {
        $this->template->title = "Jadwal Kuliah Mahasiswa";
    }

    public function action_mengajar($nip) {
        $this->template->title = "Jadwal Mengajar Dosen";
    }

} // End Jadwal
