<?php defined('SYSPATH') or die('No direct script access.');

class Controller_User extends Controller_Website {
    
    public function before() {
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

    public function action_edit() {
        $this->template->title = "Edit User";
    }

    public function action_delete() {
        $this->template->title = "Delete User";
    }

} // End User
