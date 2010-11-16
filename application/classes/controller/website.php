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
}