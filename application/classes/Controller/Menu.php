<?php

class Controller_Menu extends Controller_Design {

    public function action_index() {
        POJO_Session::getInstance()->isLogged();

        $this->addressStyles = array("storage/styles/css/sticky-footer-navbar.css", "storage/styles/css/style.css", "storage/styles/css/form-validation.css");

        $lista = DAO_Menu::getInstance()->listMenu();

        $pagination = Pagination::factory(array(
                    'total_items' => $lista->count(),
                    'items_per_page' => 5
        ));

        $menus = ORM::factory('Menu')
                ->limit($pagination->items_per_page)
                ->offset($pagination->offset)
                ->find_all()
                ->as_array('menu');

        $this->page = View::factory('menu/list')
                ->set('menus', $menus)
                ->set('pagination', $pagination)
                ->set('urlNew', URL::site('menu/new'));
    }

    public function action_new() {
        POJO_Session::getInstance()->isLogged();

        $menuDAO = DAO_Menu::getInstance();

        $this->addressStyles = array("storage/styles/css/sticky-footer-navbar.css", "storage/styles/css/style.css", "storage/styles/css/form-validation.css");

        if (HTTP_Request::POST == $this->request->method()) {

            $menu = new POJO_Menu();

            $menu->setMenu($this->request->post('txtMenu'));
            $menu->setParent($this->request->post('cmbParent'));
            $menu->setAddress($this->request->post('txtAddress'));
            $menu->setOrdinance($this->request->post('txtOrdinance'));
            $menu->setPublished($this->request->post('chkPublished'));

            if ($menuDAO->insert($menu)) {
                $this->alert('success', 'menu.menuSuccessSave', 'success', 'menu');
            }
        } else {
            $this->actionForm = URL::site('menu/new');

            $this->page = View::factory('menu/new')
                    ->set('menus', $menuDAO->listMenu());
        }
    }

    public function action_update() {
        POJO_Session::getInstance()->isLogged();
        $menuDAO = DAO_Menu::getInstance();
        $this->addressStyles = array("storage/styles/css/sticky-footer-navbar.css", "storage/styles/css/style.css", "storage/styles/css/form-validation.css");

        if (HTTP_Request::POST == $this->request->method()) {

            $menu = new POJO_Menu();

            $menu->setCode($this->request->param('id'));
            $menu->setMenu($this->request->post('txtMenu'));
            $menu->setAddress($this->request->post('txtAddress'));
            $menu->setParent($this->request->post('cmbParent'));
            $menu->setOrdinance($this->request->post('txtOrdinance'));
            $menu->setPublished($this->request->post('chkPublished'));

            if ($menuDAO->update($menu)) {
                $this->alert('success', 'menu.menuSuccessUpdate', 'success', 'menu');
            }
        } else {

            $menu = new POJO_Menu();

            $menu->setCode($this->request->param('id'));

            $this->actionForm = URL::site('menu/update/' . $menu->getCode());

            $this->page = View::factory('menu/update')
                    ->set('menu', $menuDAO->findForCode($menu->getCode()))
                    ->set('menus', $menuDAO->listMenu());
        }
    }

    public function action_delete() {
        POJO_Session::getInstance()->isLogged();
        if (is_null(DAO_Menu::getInstance()->delete($this->request->param('id')))) {
            $this->addressStyles = array("storage/styles/css/sticky-footer-navbar.css", "storage/styles/css/style.css", "storage/styles/css/form-validation.css");
            $this->alert('success', 'menu.menuSuccessDelete', 'success', 'menu');
        }
    }

}
