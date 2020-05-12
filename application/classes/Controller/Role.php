<?php

class Controller_Role extends Controller_Design {

    public function action_index() {
        POJO_Session::getInstance()->isLogged();

        $this->addressStyles = array("storage/styles/css/sticky-footer-navbar.css", "storage/styles/css/style.css", "storage/styles/css/form-validation.css");

        $roleDAO = DAO_Role::getInstance();
        
        $pagination = $roleDAO->pagination($roleDAO->listRole());

        $this->page = View::factory('role/list')
                ->set('roles', $roleDAO->paginationList($pagination))
                ->set('pagination', $pagination);
    }

    public function action_new() {

        POJO_Session::getInstance()->isLogged();

        $this->addressStyles = array("storage/styles/css/sticky-footer-navbar.css", "storage/styles/css/style.css", "storage/styles/css/form-validation.css");

        if (HTTP_Request::POST == $this->request->method()) {

            $role = new POJO_Role();

            $role->setName($this->request->post('txtRole'));
            $role->setDescription($this->request->post('txtDescription'));

            $role->setCode(DAO_Role::getInstance()->insert($role));

            if ($role->getCode()) {
                $this->alert('success', 'role.save', 'success', 'role');
            }
        } else {

            $this->actionForm = URL::site('role/new');

            $this->page = View::factory('role/new');
        }
    }

    public function action_update() {

        POJO_Session::getInstance()->isLogged();

        $this->addressStyles = array("storage/styles/css/sticky-footer-navbar.css", "storage/styles/css/style.css", "storage/styles/css/form-validation.css");

        $role = new POJO_Role();

        $role->setCode($this->request->param('id'));

        if (HTTP_Request::POST == $this->request->method()) {

            $role->setName($this->request->post('txtRole'));
            $role->setDescription($this->request->post('txtDescription'));

            DAO_Role::getInstance()->update($role);

            if ($role->getCode()) {
                $this->alert('success', 'role.update', 'success', 'role');
            }
        } else {

            $url = 'role/update';

            $this->actionForm = URL::site($url . '/' . $role->getCode());

            $this->page = View::factory($url)
                    ->set('role', DAO_Role::getInstance()->findRoleForCode($role->getCode()));
        }
    }

    public function action_delete() {
        POJO_Session::getInstance()->isLogged();

        $this->addressStyles = array("storage/styles/css/sticky-footer-navbar.css", "storage/styles/css/style.css", "storage/styles/css/form-validation.css");

        $role = new POJO_Role();

        $role->setCode($this->request->param('id'));

        DAO_Role::getInstance()->delete($role);

        if (is_null($role->getCode())) {
            $this->alert('success', 'role.delete', 'success', 'role');
        }
    }

    public function action_permission() {
        POJO_Session::getInstance()->isLogged();

        $this->addressStyles = array("storage/styles/css/sticky-footer-navbar.css", "storage/styles/css/style.css", "storage/styles/css/form-validation.css");

        $role = new POJO_Role();
        $roleDAO = DAO_Role::getInstance();

        $role->setCode($this->request->param('id'));

        if (HTTP_Request::POST == $this->request->method()) {

            $menu = new POJO_Menu();

            $menu->setCode((isset($_POST['chkMenu'])) ? $_POST['chkMenu'] : NULL );

            $role->addMenu($menu);

            $roleDAO->permissions($role);

            if ($role->getCode()) {
                $this->alert('success', 'role.update', 'success', 'role');
            }
        } else {
            $this->page = View::factory('role/permission/permission')
                    ->set('role', $roleDAO->findRoleForCode($role->getCode()))
                    ->set('perfis', $roleDAO->findForCode($role->getCode())->menu->find_all())
                    ->set('menus', DAO_Menu::getInstance()->listMenu());
        }
    }

}
