<?php defined('SYSPATH') or die('No direct script access.');

class Controller_User extends Controller_Website {

    public $secure_actions = array(
        'list'      => 'admin',
        'add'       => 'admin',
        'delete'    => 'admin',
        'logout'    => 'login',
        'edit'      => 'login'
    );

    public function before() {
        if (in_array(Request::instance()->action, array('login'))) {
            $this->template = 'template/one_column';
        }
        parent::before();
    }
    
    public function after() {
        parent::after();
    }

    public function action_index() {
        $this->template->title = "User";
    }

    public function action_list() {
        $this->template->title = "List User";
    }

    public function action_add() {
        $this->template->title = "Add User";
        if (isset($_POST['username'])) {
            $user = new Model_User();
            
            $user->username = $_POST['username'];
            $user->password = $_POST['password'];
            $user->save();
        }
    }

    public function action_edit($id) {
        $this->template->title = "Edit User";
        $user = new Model_User($id);

        if (isset($_POST['password'])) {
            $user->password = $_POST['password'];
            $user->save();
        }
        $this->template->content->user = $user;
    }

    public function action_delete($id) {
        $this->template->title = "Delete User";
    }

    public function action_login() {
        if (Auth::instance()->logged_in()) {
            Request::instance()->redirect('/');
        }
        $this->template->title = "Login";
        if (isset($_POST['username'])) {
            $user = new Model_User();
            $status = $user->login($_POST, 'front/index');
            if (!$status) {
                $this->template->content->status = $status;
            }
        }
    }

    public function action_logout() {
        if (Auth::instance()->logged_in()) {
            Auth::instance()->logout();
        }

        Request::instance()->redirect('/');
    }

} // End User
