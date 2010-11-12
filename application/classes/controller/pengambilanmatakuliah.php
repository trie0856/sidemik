<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Pengambilanmatakuliah extends Controller_Website {
    
    public function before() {
        parent::before();
    }
    
    public function after() {
        parent::after();
    }

    public function action_index() {
        $this->template->title = "Pengambilan matakuliah";
    }

    public function action_ambil() {
        $this->template->title = "Ambil matakuliah";
    }

    public function action_transkrip() {
        $this->template->title = "Transkrip mahasiswa";
    }

    public function action_inputnilai() {
        $this->template->title = "inputnilai mahasiswa";
    }
} // End Pengambilan matakuliah
