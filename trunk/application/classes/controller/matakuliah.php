<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Matakuliah extends Controller_Website {

    public $select_jumlah_sks = array();

    public function generateSelectJumlahSKS() {
        $select_jumlah_sks[0] = '';
        for($i=1; $i<=20; ++$i) {
            $select_jumlah_sks[$i] = $i;
        }
        $this->template->content->select_jumlah_sks = $select_jumlah_sks;
    }

    public function before() {
        parent::before();
    }
    
    public function after() {
        parent::after();
    }

    public function action_index() {
        $this->template->title = "Matakuliah";
    }

    public function action_view($kode) {
        $this->template->title = "View Matakuliah";
        $matakuliah = new Model_Matakuliah($kode);
        $this->template->content->matakuliah = $matakuliah;
    }

    public function action_list() {
        $this->template->title = "List Matakuliah";
        $matakuliahs = new Model_Matakuliah();
        $this->template->content->matakuliahs = $matakuliahs->find_all();
    }

    public function action_add() {
        $this->template->title = "Add Matakuliah";
        $this->generateSelectJumlahSKS();

        if (isset($_POST['kode']) && isset($_POST['nama'])) {
            $matakuliah = new Model_Matakuliah();

            $matakuliah->kode = $_POST['kode'];
            $matakuliah->nama = $_POST['nama'];
            $matakuliah->jumlah_sks = $_POST['jumlah_sks'];
            $matakuliah->deskripsi = $_POST['deskripsi'];
            $matakuliah->tingkat = $_POST['tingkat'];
            $matakuliah->semester_buka = $_POST['semester_buka'];

            $matakuliah->save();
        }
    }

    public function action_edit($kode) {
        $this->template->title = "Edit Matakuliah";

        $matakuliah = new Model_Matakuliah($kode);
        if (isset ($_POST['nama'])) {
            $matakuliah->nama = $_POST['nama'];
            $matakuliah->jumlah_sks = $_POST['jumlah_sks'];
            $matakuliah->deskripsi = $_POST['deskripsi'];
            $matakuliah->tingkat = $_POST['tingkat'];
            $matakuliah->semester_buka = $_POST['semester_buka'];

            $matakuliah->save();
        }
        $this->template->content->matakuliah = $matakuliah;
        $this->generateSelectJumlahSKS();
    }

    public function action_delete($kode) {
        $this->template->title = "Delete Matakuliah";

        $matakuliah = new Model_Matakuliah($kode);
        $matakuliah->delete();
    }

} // End Matakuliah
