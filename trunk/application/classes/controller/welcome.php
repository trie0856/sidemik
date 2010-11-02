<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Welcome extends Controller_Website {

	public function action_index()
	{
            $this->template->title = "Welcome";
            $this->template->content = "hehhe";
	}

} // End Welcome
