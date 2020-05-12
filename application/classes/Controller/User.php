<?php

class Controller_User extends Controller_Design {

    public function action_index() {
        POJO_Session::getInstance()->isLogged();

        $this->addressStyles = array("storage/styles/css/sticky-footer-navbar.css", "storage/styles/css/style.css", "storage/styles/css/form-validation.css");

        $dao = DAO_User::getInstance();

        $pagination = Pagination::factory(array(
                    'total_items' => $dao->listUser()->count(),
                    'items_per_page' => 5
        ));

        $users = ORM::factory('User')
                ->limit($pagination->items_per_page)
                ->offset($pagination->offset)
                ->find_all();

        $this->page = View::factory('user/list')
                ->set('users', $users)
                ->set('pagination', $pagination);
    }

    public function action_new() {
        $this->addressStyles = array("storage/styles/css/sticky-footer-navbar.css", "storage/styles/css/style.css", "storage/styles/css/form-validation.css");

        if (!Auth::instance()->get_user()) {
            $this->navigator = View::factory("template/nav");
        }

        if (HTTP_Request::POST == $this->request->method()) {

            $person = new POJO_Person();
            $person->getUser()->setCode(DAO_User::getInstance()->insert($this->request->post()));
            $person->setName($this->request->post('txtName'));

            if ($person->getUser()->getCode()) {

                $person->setCode(DAO_Person::getInstance()->insert($person));

                $localPage = (Auth::instance()->get_user()) ? 'home' : 'auth';

                if ($person->getCode()) {
                    $this->alert('success', 'user.userSuccessSave', 'success', $localPage);
                }
            }
        } else {

            if (Auth::instance()->get_user()) {
                $userPage = 'user/broker/new';
            } else {
                $userPage = 'user/student/new';
            }

            $this->actionForm = URL::site('user/new');

            $this->page = View::factory($userPage)
                    ->set('roles', DAO_Role::getInstance()->listRole());
        }
    }

    public function action_update() {

        $this->addressStyles = array("storage/styles/css/sticky-footer-navbar.css", "storage/styles/css/style.css", "storage/styles/css/form-validation.css");
        if (HTTP_Request::POST == $this->request->method()) {

            $person = new POJO_Person();
            $role = new POJO_Role();

            $userDAO = DAO_User::getInstance();

            $person->getUser()->setCode($this->request->param('id'));

            $userData = $userDAO->findUserForCode($person->getUser()->getCode());

            $person->setName($this->request->post('txtName'));
            $person->setCode($userData->person->id);

            foreach ($userData->roles->find_all() as $value) {
                $role->setCode($value->id);
            }

            $userDAO->update($_POST, $role->getCode(), $person->getUser()->getCode());

            DAO_Person::getInstance()->update($person);

            if ($person->getCode()) {
                $this->alert('success', 'user.userSuccessSave', 'success', 'user');
            }
        } else {
            $user = new POJO_User();
            $roleDAO = DAO_Role::getInstance();

            $user->setCode($this->request->param('id'));

            $this->actionForm = URL::site('user/update/' . $user->getCode());

            $this->page = View::factory('user/update')
                    ->set('user', DAO_User::getInstance()->findUserForCode($user->getCode()))
                    ->set('roles', $roleDAO->listRole());
        }
    }

    public function action_statusUpdate() {

        $user = new POJO_User();
        $userDAO = DAO_User::getInstance();

        $user->setCode($this->request->param('id'));

        $userDAO->statusUpdate($user);

        $this->alert('success', 'user.update.status', 'success', 'user');
    }

    public function action_myAccount() {
        $this->addressStyles = array("storage/styles/css/sticky-footer-navbar.css", "storage/styles/css/style.css", "storage/styles/css/form-validation.css");
        $codeUser = $this->request->param('id');
        if (HTTP_Request::POST == $this->request->method()) {

            $person = new POJO_Person();
            $userDAO = DAO_User::getInstance();

            $person->getUser()->setCode($codeUser);

            $person->setCode($userDAO->findUserForCode($person->getUser()->getCode())->person->id);
            $person->setName($this->request->post('txtName'));

            //var_dump($_POST);

            $userDAO->updateMyAccount($_POST, $person->getUser());

            $person->setCode(DAO_Person::getInstance()->update($person));

            if ($person->getCode()) {
                $this->alert('success', 'user.myaccount.update', 'success', 'home');
            }
        } else {

            $this->actionForm = URL::site('user/myaccount/' . $codeUser);

            $user = new POJO_User();
            $roleDAO = DAO_Role::getInstance();

            $user->setCode($codeUser);

            $this->page = View::factory('user/myaccount/myaccount')
                    ->set('user', DAO_User::getInstance()->findUserForCode($user->getCode()))
                    ->set('roles', $roleDAO->listRole());
        }
    }

    public function action_teste() {

        $codeRoleRemove = 1;
        $codeRoleAdd = 3;

        $values['username'] = 'junia.peereira';
        $values['password'] = '123456789';
        $values['password_confirm'] = '123456789';
        $values['email'] = 'junia.pereira@ifnmg.edu.br';

        $orm = ORM::factory('User', 11);

        $orm->update_user($values, array('username', 'password', 'email'));

        $orm->remove('roles', $codeRoleRemove);

        $orm->add('roles', $codeRoleAdd);
    }

}
