<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Website extends Controller_Template {

    public function before() {
        parent::before();

        if ($this->auto_render) {
            $contentsLink = $this->request->controller.'/'.$this->request->action;
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
        }
    }
}