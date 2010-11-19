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
        
        $dosens = new Model_Dosen();
        $this->template->content->dosens = $dosens->find_all();
    }

    public function action_add() {
        $this->template->title = "Add Dosen";

        if (isset($_POST['nip'])) {
            $dosen = new Model_Dosen();
            $user = new Model_User();

            $user->username = $_POST['nip'];
            $user->password = $_POST['password'];
            $user->save();

            // Masukkan role user
            $user->add('roles', ORM::factory('role')->where('name', '=', 'login')->find());
            $user->add('roles', ORM::factory('role')->where('name', '=', 'dosen')->find());

            $dosen->nip = $_POST['nip'];
            $dosen->user_id = $user->id;
            $dosen->nama = $_POST['nama'];
            $dosen->tahun_masuk = $_POST['tahun_masuk'];
            $dosen->tempat_lahir = $_POST['tempat_lahir'];
            $tanggal_lahir = $_POST['tahun'] . "-" . $_POST['bulan'] . "-" . $_POST['tanggal'];
            $dosen->tanggal_lahir = $tanggal_lahir;
            $dosen->jenis_kelamin = $_POST['jenis_kelamin'];
            $dosen->alamat = $_POST['alamat'];
            $dosen->no_hp = $_POST['no_hp'];
            $dosen->telp_rumah = $_POST['telp_rumah'];
            $dosen->email = $_POST['email'];

            $dosen->save();
        }
    }

    public function action_edit($nip) {
        $this->template->title = "Edit Dosen";

        $dosen = new Model_Dosen($nip);
        $explode = explode('-', $dosen->tanggal_lahir);
        $dosen->tahun = $explode[0];
        $dosen->bulan = $explode[1];
        $dosen->tanggal = $explode[2];

        if (isset($_POST['nama'])) {
            $dosen->nama = $_POST['nama'];
            $dosen->tahun_masuk = $_POST['tahun_masuk'];
            $dosen->tempat_lahir = $_POST['tempat_lahir'];
            $tanggal_lahir = $_POST['tahun'] . "-" . $_POST['bulan'] . "-" . $_POST['tanggal'];
            $dosen->tanggal_lahir = $tanggal_lahir;
            $dosen->jenis_kelamin = $_POST['jenis_kelamin'];
            $dosen->alamat = $_POST['alamat'];
            $dosen->no_hp = $_POST['no_hp'];
            $dosen->telp_rumah = $_POST['telp_rumah'];
            $dosen->email = $_POST['email'];

            $dosen->save();
        }
        $this->template->content->dosen = $dosen;
    }

    public function action_delete() {
        $this->template->title = "Delete Dosen";

        $dosen = new Model_Dosen($nip);
        $dosen->delete();
    }

} // End Dosen
