<?php

class Controller_Theme extends Controller_Design {

    public function action_index() {
        POJO_Session::getInstance()->isLogged();

        $this->addressStyles = array("storage/styles/css/sticky-footer-navbar.css", "storage/styles/css/style.css", "storage/styles/css/form-validation.css");

        $lista = DAO_Theme::getInstance()->listTheme();

        $pagination = Pagination::factory(array(
                    'total_items' => $lista->count(),
                    'items_per_page' => 5
        ));

        $themes = ORM::factory('Theme')
                ->limit($pagination->items_per_page)
                ->offset($pagination->offset)
                ->find_all();

        $this->page = View::factory('theme/list')
                ->set('themes', $themes)
                ->set('pagination', $pagination)
                ->set('urlNew', URL::site('theme/new'));
    }

    public function action_new() {
        POJO_Session::getInstance()->isLogged();

        $this->addressStyles = array("storage/styles/css/sticky-footer-navbar.css", "storage/styles/css/style.css", "storage/styles/css/form-validation.css");

        if (HTTP_Request::POST == $this->request->method()) {

            $theme = new POJO_Theme();

            $theme->setTheme($this->request->post('txtTheme'));
            $theme->setValidity($this->request->post('txtValidity'));
            $theme->setDescription($this->request->post('txtDescription'));

            if (DAO_Theme::getInstance()->insert($theme)) {
                $this->alert('success', 'theme.themeSuccessSave', 'success', 'theme');
            }
        } else {
            $this->actionForm = URL::site('theme/new');

            $this->page = View::factory('theme/new');
        }
    }

    public function action_update() {
        POJO_Session::getInstance()->isLogged();

        $this->addressStyles = array("storage/styles/css/sticky-footer-navbar.css", "storage/styles/css/style.css", "storage/styles/css/form-validation.css");

        if (HTTP_Request::POST == $this->request->method()) {

            $theme = new POJO_Theme();

            $theme->setCode($this->request->param('id'));
            $theme->setTheme($this->request->post('txtTheme'));
            $theme->setValidity($this->request->post('txtValidity'));
            $theme->setDescription($this->request->post('txtDescription'));

            if (DAO_Theme::getInstance()->update($theme)) {
                $this->alert('success', 'theme.themeSuccessUpdate', 'success', 'theme');
            }
        } else {

            $theme = new POJO_Theme();

            $theme->setCode($this->request->param('id'));

            $this->actionForm = URL::site('theme/update/' . $theme->getCode());

            $this->page = View::factory('theme/update')
                    ->set('theme', DAO_Theme::getInstance()->findForCode($theme->getCode()));
        }
    }

    public function action_view() {
        POJO_Session::getInstance()->isLogged();

        $this->addressStyles = array("storage/styles/css/sticky-footer-navbar.css", "storage/styles/css/style.css", "storage/styles/css/form-validation.css");

        $theme = new POJO_Theme();

        $theme->setCode($this->request->param('id'));

        $this->page = View::factory('theme/view')
                ->set('theme', DAO_Theme::getInstance()->findForCode($theme->getCode()));
    }

    public function action_delete() {
        POJO_Session::getInstance()->isLogged();
        if (is_null(DAO_Theme::getInstance()->delete($this->request->param('id')))) {
            $this->addressStyles = array("storage/styles/css/sticky-footer-navbar.css", "storage/styles/css/style.css", "storage/styles/css/form-validation.css");
            $this->alert('success', 'theme.themeSuccessDelete', 'success', 'theme');
        }
    }

}
