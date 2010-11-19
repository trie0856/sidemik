<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Website extends Controller_Template {

    public $template = 'template/two_column';

    // Controls access for the whole controller, if not set to FALSE we will only allow user roles specified
    // Can be set to a string or an array, for example 'login' or array('login', 'admin')
    // Note that in second(array) example, user must have both 'login' AND 'admin' roles set in database
    public $auth_required = FALSE;

    // Controls access for separate actions
    // 'adminpanel' => 'admin' will only allow users with the role admin to access action_adminpanel
    // 'moderatorpanel' => array('login', 'moderator') will only allow users with the roles login and moderator to access action_moderatorpanel
    public $secure_actions = FALSE;

    public function before() {

        $this->check_for_need_two_navigation_template();
        
        parent::before();

        $action_name = Request::instance()->action;
        if (($this->auth_required !== FALSE && Auth::instance()->logged_in($this->auth_required) === FALSE)
                || (is_array($this->secure_actions) && array_key_exists($action_name, $this->secure_actions) &&
                Auth::instance()->logged_in($this->secure_actions[$action_name]) === FALSE))
	{
            if (Auth::instance()->logged_in()) {
                Request::instance()->redirect('/');
            } else {
                Request::instance()->redirect('user/login');
            }
	}


        if ($this->auto_render) {
            $controller = $this->request->controller;
            $action = $this->request->action;
            $contentsLink = $controller.'/'.$action;
            $this->template->content = View::factory($contentsLink);
            $this->template->styles = array();
            $this->template->scripts = array();
            $this->template->links = array();
            $this->template->auth_user = Auth::instance();
        }
    }

    public function after() {
        parent::after();

        if ($this->auto_render) {
            $styles = array('media/css/style.css' => 'screen');
            $this->template->styles = array_merge($this->template->styles, $styles);

            $links  = Kohana::config('link');
            $this->add_id_to_some_links($links);
            $this->filter_links($links);
            $this->template->links = $links;

            if(Auth::instance()->logged_in(array('admin', 'tata_usaha'))) {
                $this->admin_tu_func_set_session();
                $links = Kohana::config('link_admin_tu');
                $links = $this->admin_tu_filter_links($links);
                $this->admin_tu_func_add_id_for_links($links);
                $this->template->links_2 = $links;
            }

            // Kelola Greeting
            $greeting = $this->manage_greeting();
            $this->template->greeting = $greeting;
        }
    }

    public function filter_links(& $links) {
        $newlinks = array();
        $rule;
        foreach ($links as $title => $link) {
            if (Auth::instance()->logged_in($link['role'])) {
                $newlinks[$title] = $link;
            }
        }

        $links = $newlinks;
    }

    public function add_id_to_some_links(& $links) {

        $user_id;
        if (Auth::instance()->logged_in()) {
            $user_id = Auth::instance()->get_user()->id;
            $links["Ubah Password"]["link"] .= '/' . $user_id;
        }

        if (Auth::instance()->logged_in('mahasiswa')) {
            $mahasiswa = new Model_Mahasiswa(array('user_id' => $user_id));
            $links["Profil Mahasiswa"]["link"] .= '/' . $mahasiswa->nim;
            $links["KSM"]["link"] .= '/' . $mahasiswa->nim;
            $links["Transkrip Akademik"]["link"] .= '/' . $mahasiswa->nim;
            $links["Jadwal Kuliah"]["link"] .= '/' . $mahasiswa->nim;
        }
    }

    /**
     * Memeriksa apakah halaman yang di-<i>request</i> membutuhkan template
     * dengan dua navigasi. Jika ya, $template = 'template/tow_navigation'.
     */
    public function check_for_need_two_navigation_template() {
        if (Auth::instance()->logged_in(array('admin', 'tata_usaha'))) {
            $links = Kohana::config('link_admin_tu');
            $request = Request::instance();
            $key = $request->controller . '/' . $request->action;

            if ($key == 'user/edit' && $request->param('id') == Auth::instance()->get_user()->id) {
                // do nothing
            } else if (array_key_exists($key, $links)) {
                $this->template = 'template/two_navigation';
            }
        }
    }

    /**
     * Menerima inputan links kemudian melakukan filter sesuai dengan role dari
     * pengguna yang sedang login. Fungsi akan mengembalikan link baru setelah
     * selesai melakukan filter.
     * @param array $links he
     * @return array
     */
    public function admin_tu_filter_links($links) {
        $newlinks = array();

        foreach($links as $link => $value) {
            if (Auth::instance()->logged_in($value['role'])) {
                $newlinks[$link] = $value;
            }
        }

        return $newlinks;
    }


    /**
     * Menambahkan id pada akhir masing - masing link untuk navigasi tambahan
     * pada admin dan tata usaha.
     */
    public function admin_tu_func_add_id_for_links(& $links) {
        $newlinks = array();
        foreach ($links as $link => $value) {
            if ($link == 'user/edit') {
                $newlinks[$link . '/' . Session::instance()->get('user_id')] = $links[$link];
            } else {
                $newlinks[$link . '/' . Session::instance()->get('nim')] = $links[$link];
            }
        }

        $links = $newlinks;
    }

    /**
     * Menyimpan nim mahasiswa, nim dosen atau user_id dalam session jika admin
     * atau tata_usaha mengunjungi profil mahasiswa atau dosen tertentu.
     */
    public function admin_tu_func_set_session() {
        $request = Request::instance();
        $key = $request->controller . '/' . $request->action;
        if ($key == 'mahasiswa/profil') {
            $nim = $request->param('id');
            Session::instance()->set('nim', $nim);
            $mahasiswa = new Model_Mahasiswa($nim);
            Session::instance()->set('user_id', $mahasiswa->user_id);
        } else if ($key == 'dosen/profil'){
            $nip = $request->param('id');
            Session::instance()->set('nip', $nip);
            $dosen = new Model_Dosen($nip);
            Session::instance()->set('user_id', $dosen->user_id);
        }
    }

    /**
     * Mengembalikan kalimat greeting sesuai dengan pengguna yang sedang login
     * @return string
     */
    public function manage_greeting() {
        $auth = Auth::instance();
        $greeting = '';

        if ($auth->logged_in()) { // user login
            $user = $auth->get_user();
            
            if ($auth->logged_in('mahasiswa'))  // jika yang login mahasiswa
            {
                $mahasiswa = new Model_Mahasiswa(array('user_id' => $user->id));
                $greeting = "> Selamat Datang, $mahasiswa->nama";
            }
            else if ($auth->logged_in('dosen')) // jika yang login
            {
                $dosen = new Model_Dosen(array('user_id', $user->id));
                $greeting = "> Selamat Datang, $dosen->nama";
            }
            else //jika yang login tata usah atau admin
            {
                $greeting = "> Selamat Datang, $user->username";
            }
        }

        return $greeting;
    }
}