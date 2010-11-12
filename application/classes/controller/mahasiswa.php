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

        if (isset($_POST['nim'])) {
            $mahasiswa = new Model_Mahasiswa();
            $user = new Model_User();

            $user->username = $_POST['nim'];
            $user->password = $_POST['password'];
            $user->save();

            $mahasiswa->nim = $_POST['nim'];
            $mahasiswa->username_id = $user->id;
            $mahasiswa->nama = $_POST['nama'];
            $mahasiswa->tempat_lahir = $_POST['tempat_lahir'];
            $mahasiswa->tanggal_lahir = $_POST['tanggal_lahir'];
            $mahasiswa->email = $_POST['email'];
            $mahasiswa->alamat = $_POST['alamat'];
            $mahasiswa->no_hp = $_POST['no_hp'];
            $mahasiswa->nama_ayah = $_POST['nama_ayah'];
            $mahasiswa->telp_rumah = $_POST['telp_rumah'];
            $mahasiswa->tahun_masuk = $_POST['tahun_masuk'];
            $mahasiswa->status_kelulusan = $_POST['status_kelulusan'];

            $mahasiswa->save();
        }
    }

    public function action_edit() {
        $this->template->title = "Edit Mahasiswa";
    }

    public function action_delete() {
        $this->template->title = "Delete Mahasiswa";
    }

} // End Mahasiswa
