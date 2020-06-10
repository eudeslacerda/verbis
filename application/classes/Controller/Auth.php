<?php

/**
 * Description of Autenticacao
 *
 * @author eude
 */
class Controller_Auth extends Controller_Design {

    public function action_index() {
        if (Auth::instance()->logged_in()) {
            HTTP::redirect('home');
        } else {
            $this->addressStyles = array("storage/styles/css/floating-label.css");
            $this->logo = URL::site("storage/media/images/logo.svg");
            $this->actionForm = URL::site('auth/login');
            $this->contents = View::factory("auth/login");
        }
    }

    public function action_login() {
        $this->navigator = '';
        $this->addressStyles = array("storage/styles/css/sticky-footer-navbar.css");

        if (Auth::instance()->logged_in()) {
            HTTP::redirect('home');
        } else {
            if (HTTP_Request::POST == $this->request->method()) {
                try {
                    $remember = ($this->request->post('remember')) ? TRUE : FALSE;
                    
                    $user = Auth::instance()->login(
                            $this->request->post('username'), $this->request->post('password'), $remember
                    );
                   //var_dump($user);
                    if ($user) {
                        $userData = DAO_User::getInstance()->findUserForCode(Auth::instance()->get_user());
                        if ($userData->has('roles', ORM::factory('role', array('name' => 'Discente')))) {
                            if (is_null($userData->person->student->id)) {
                                HTTP::redirect('student');
                            } else {
                                HTTP::redirect('home');
                            }
                        } else {
                            HTTP::redirect('home');
                        }
                    } else {
                        $this->page = View::factory('template/alert')
                                ->set('messege', Kohana::message('warning', 'auth.invalidAccess'))
                                ->set('type', 'warning')
                                ->set('url', URL::site('auth'));
                    }
                } catch (ORM_Validation_Exception $e) {
                    echo $e->getMessage();
                }
            } else {
                HTTP::redirect('auth');
            }
        }
    }

    public function action_logout() {
        if (Auth::instance()->logout(TRUE, TRUE)) {
            HTTP::redirect('auth');
        }
    }

}
