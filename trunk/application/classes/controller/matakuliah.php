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

        if (isset($_POST['kode']) && isset($_POST['nama'])) {
            $matakuliah = new Model_Matakuliah();

            $matakuliah->kode = $_POST['kode'];
            $matakuliah->nama = $_POST['nama'];
            $matakuliah->deskripsi = $_POST['deskripsi'];
            $matakuliah->tingkat = $_POST['tingkat'];
            $matakuliah->semester_buka = $_POST['semester_buka'];

            $matakuliah->save();
        }
    }

    public function action_edit($kode) {
        $this->template->title = "Edit Matakuliah";

        $matakuliah = new Model_Matakuliah($kode);

        if (isset ($_POST['kode'])) {
            $matakuliah->nama = $_POST['nama'];
            $matakuliah->deskripsi = $_POST['deskripsi'];
            $matakuliah->tingkat = $_POST['tingkat'];
            $matakuliah->semester_buka = $_POST['semester_buka'];

            $matakuliah->save();
        }
        
        $this->template->content->matakuliah = $matakuliah;
    }

    public function action_delete() {
        $this->template->title = "Delete Matakuliah";
    }

} // End Matakuliah
