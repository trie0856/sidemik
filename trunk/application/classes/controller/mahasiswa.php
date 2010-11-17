<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Mahasiswa extends Controller_Website {

    public $auth_required = 'login';
    public $secure_actions = array(
        'profil'    => array('admin', 'tata_usaha', 'dosen', 'mahasiswa'),
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
    }

    public function action_profil($nim) {
        $this->template->title = "Profil Mahasiswa";
        $mahasiswa = new Model_Mahasiswa($nim);
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
            $mahasiswa->tanggal_lahir = $_POST['tanggal_lahir'];
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

        $mahasiswa = new Model_Mahasiswa($nim);

        if (isset($_POST['nama'])) {
            $mahasiswa->nama = $_POST['nama'];
            $mahasiswa->tempat_lahir = $_POST['tempat_lahir'];
            $mahasiswa->tanggal_lahir = $_POST['tanggal_lahir'];
            $mahasiswa->jenis_kelamin = $_POST['jenis_kelamin'];
            $mahasiswa->email = $_POST['email'];
            $mahasiswa->alamat = $_POST['alamat'];
            $mahasiswa->no_hp = $_POST['no_hp'];
            $mahasiswa->nama_ayah = $_POST['nama_ayah'];
            $mahasiswa->telp_rumah = $_POST['telp_rumah'];
            $mahasiswa->tahun_masuk = $_POST['tahun_masuk'];

            $mahasiswa->save();
        }
        $this->template->content->mahasiswa = $mahasiswa;
    }

    public function action_delete($nim) {
        $this->template->title = "Delete Mahasiswa";

        $mahasiswa = new Model_Mahasiswa($nim);
        $mahasiswa->delete();
    }

    public function action_statuspembayaran($nim) {
        $this->template->title = 'Mahasiswa - Status pembayaran';
    }
} // End Mahasiswa