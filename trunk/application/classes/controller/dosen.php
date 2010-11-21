<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Dosen extends Controller_Website {

    public $auth_required = 'login';
    public $secure_actions = array(
        'profil'    => 'login',
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
         if (Auth::instance()->logged_in('dosen')) {
            $user = Auth::instance()->get_user();
            $dosen = new Model_Dosen();
            $dosen = $dosen->where('user_id', '=', $user->id)->find();
            Request::instance()->redirect('dosen/profil/' . $dosen->nip);
        } else {
            Request::instance()->redirect('dosen/list');
        }
    }

    public function action_profil($nip) {
        $auth = Auth::instance();

        $this->template->title = "Profil Dosen";
        $dosen = new Model_Dosen($nip);
        $referensi_jenis_kelamin = array('-1' => '', '0' => 'Wanita', '1' => 'Pria');
        $this->template->content->dosen = $dosen;
        $this->template->content->referensi_jenis_kelamin = $referensi_jenis_kelamin;
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

        if (isset($_POST['nama'])) {
            $dosen = new Model_Dosen($nip);
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
        
        $dosen = new Model_Dosen($nip);
        $explode = explode('-', $dosen->tanggal_lahir);
        $dosen->tahun = $explode[0];
        $dosen->bulan = $explode[1];
        $dosen->tanggal = $explode[2];
        $this->template->content->dosen = $dosen;
    }

    public function action_delete() {
        $this->template->title = "Delete Dosen";

        $dosen = new Model_Dosen($nip);
        $dosen->delete();
    }

} // End Dosen
