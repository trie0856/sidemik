<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Mahasiswa extends Controller_Website {

    public $auth_required = 'login';
    public $secure_actions = array(
        'profil'    => 'login',
        'list'      => array('admin', 'tata_usaha'),
        'add'       => 'admin',
        'edit'      => 'admin',
        'delete'    => 'admin',
    );

    public function before() {
        parent::before();
    }
    
    public function after() {
        parent::after();
    }

    public function action_index() {
        $this->template->title = "Mahasiswa";
        if (Auth::instance()->logged_in('mahasiswa')) {
            $user = Auth::instance()->get_user();
            $mahasiswa = new Model_Mahasiswa();
            $mahasiswa = $mahasiswa->where('user_id', '=', $user->id)->find();
            Request::instance()->redirect('mahasiswa/profil/' . $mahasiswa->nim);
        } else {
            Request::instance()->redirect('mahasiswa/list');
        }
    }

    public function action_profil($nim) {
        $auth = Auth::instance();

        $this->template->title = "Profil Mahasiswa";
        $mahasiswa = new Model_Mahasiswa($nim);
        $mahasiswa->semester = Sidemik::getSemester($nim);
        $mahasiswa->ipk = Sidemik::calculateIPK($nim);
        $referensi_jenis_kelamin = array('-1' => '', '0' => 'Wanita', '1' => 'Pria');
        $this->template->content->mahasiswa = $mahasiswa;
        $this->template->content->referensi_jenis_kelamin = $referensi_jenis_kelamin;
    }

    public function action_list() {
        $this->template->title = "List Mahasiswa";

        $mahasiswas = new Model_Mahasiswa();
        $this->template->content->mahasiswas = $mahasiswas->find_all();
    }

    public function action_add() {
        $this->template->title = "Add Mahasiswa";

        if (isset($_POST['nim'])) {
            $mahasiswa = new Model_Mahasiswa();
            $user = new Model_User();

            $user->username = $_POST['nim']; // nimnya harus dicek dulu nih
            $user->password = $_POST['password'];
            $user->save();

            // Masukkan role user
            $user->add('roles', ORM::factory('role')->where('name', '=', 'login')->find());
            $user->add('roles', ORM::factory('role')->where('name', '=', 'mahasiswa')->find());

            $mahasiswa->nim = $_POST['nim']; // nimnya harus dicek dulu nih
            $mahasiswa->user_id = $user->id;
            $mahasiswa->nama = $_POST['nama'];
            $mahasiswa->tempat_lahir = $_POST['tempat_lahir'];
            $tanggal_lahir = $_POST['tahun'] . "-" . $_POST['bulan'] . "-" . $_POST['tanggal'];
            $mahasiswa->tanggal_lahir = $tanggal_lahir;
            $mahasiswa->jenis_kelamin = $_POST['jenis_kelamin'];
            $mahasiswa->email = $_POST['email'];
            $mahasiswa->alamat = $_POST['alamat'];
            $mahasiswa->no_hp = $_POST['no_hp'];
            $mahasiswa->nama_ayah = $_POST['nama_ayah'];
            $mahasiswa->telp_rumah = $_POST['telp_rumah'];
            $mahasiswa->tahun_masuk = $_POST['tahun_masuk'];
            $mahasiswa->status_kelulusan = 2; // belum lulus

            $mahasiswa->save();
        }
    }

    public function action_edit($nim) {
        $this->template->title = "Edit Mahasiswa";

        if (isset($_POST['nama'])) {
            $mahasiswa = new Model_Mahasiswa($nim);
            $mahasiswa->nama = $_POST['nama'];
            $mahasiswa->tempat_lahir = $_POST['tempat_lahir'];
            $tanggal_lahir = $_POST['tahun'] . "-" . $_POST['bulan'] . "-" . $_POST['tanggal'];
            $mahasiswa->tanggal_lahir = $tanggal_lahir;
            $mahasiswa->jenis_kelamin = $_POST['jenis_kelamin'];
            $mahasiswa->email = $_POST['email'];
            $mahasiswa->alamat = $_POST['alamat'];
            $mahasiswa->no_hp = $_POST['no_hp'];
            $mahasiswa->nama_ayah = $_POST['nama_ayah'];
            $mahasiswa->telp_rumah = $_POST['telp_rumah'];
            $mahasiswa->tahun_masuk = $_POST['tahun_masuk'];

            $mahasiswa->save();
        }
        
        $mahasiswa = new Model_Mahasiswa($nim);
        $explode = explode('-', $mahasiswa->tanggal_lahir);
        $mahasiswa->tahun = $explode[0];
        $mahasiswa->bulan = $explode[1];
        $mahasiswa->tanggal = $explode[2];
        $this->template->content->mahasiswa = $mahasiswa;
    }

    public function action_delete($nim) {
        $this->template->title = "Delete Mahasiswa";

        $mahasiswa = new Model_Mahasiswa($nim);
        $mahasiswa->delete();
    }

    public function action_statuspembayaran($nim) {
        $this->template->title = 'Mahasiswa - Status pembayaran';

        if (isset($_POST['bayar'])) {
            // hapus data lama
            $status = new Model_Statuspembayaran(array('nim' => $nim));
            $status->delete_all();
            
            foreach ($_POST['bayar'] as $sem => $value) {
                $status = new Model_Statuspembayaran();
                $status->nim = $nim;
                $status->semester = $sem;
                $status->save();
            }
        }

        $status = new Model_Statuspembayaran();
        $status = $status->where('nim' ,'=', $nim)->find_all();
        $bayar = array();
        foreach($status as $s) {
            $bayar[] = $s->semester;
        }
        
        $this->template->content->bayar = $bayar;
    }
} // End Mahasiswa