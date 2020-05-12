<?php

/**
 * Description of Chave
 *
 * @author EUDE LACERDA
 */
class Controller_Secret extends Controller_Design{

    public function action_index() {

        POJO_Session::getInstance()->isLogged();
        
        $this->addressStyles = array("storage/styles/css/sticky-footer-navbar.css", "storage/styles/css/style.css","storage/styles/css/form-validation.css");

        $lista = DAO_Secret::getInstance()->listSecret();

        $countKeys = ORM::factory('Secret')->count_all();

        $pagination = Pagination::factory(array(
                    'total_items' => $countKeys,
                    'items_per_page' => 5
        ));

        $keys = ORM::factory('Secret')
                ->limit($pagination->items_per_page)
                ->offset($pagination->offset)
                ->find_all();
        
        $this->page = View::factory('secret/list')
                ->set('keys', $keys)
                ->set('pagination', $pagination)
                ->set('urlNew', URL::site('secret/new'));
    }

    public function action_new() {
        
        POJO_Session::getInstance()->isLogged();
        
        $this->addressStyles = array("storage/styles/css/sticky-footer-navbar.css", "storage/styles/css/style.css", "storage/styles/css/form-validation.css");

        $institutions = DAO_Institution::getInstance()->listInstitution();

        $this->actionForm = URL::site('secret/new');

        if (HTTP_Request::POST == $this->request->method()) {

            $secret = new POJO_Secret();

            $secret->setQuantity($_POST['txtQuantity']);
            $secret->setValidity($_POST['txtValidity']);
            $secret->getInstitution()->setCode($_POST['cmbInstitution']);
            $secret->GenerateKey();

            if (DAO_Secret::getInstance()->insert($secret)) {
                $this->page = View::factory('template/alert')
                        ->set('messege', Kohana::message('success', 'secret.secretSuccessGenerate'))
                        ->set('type', 'success')
                        ->set('url', URL::site('secret'));
            }
        } else {
            $this->page = View::factory('secret/new')
                    ->set('institutions', $institutions);
        }
    }

    public function action_delete() {

        POJO_Session::getInstance()->isLogged();
        
        if (DAO_Secret::getInstance()->delete($this->request->param('id'))) {
            $this->addressStyles = array("storage/styles/css/sticky-footer-navbar.css", "storage/styles/css/style.css", "storage/styles/css/form-validation.css");
            $this->page = View::factory('template/alert')
                    ->set('messege', Kohana::message('success', 'secret.secretSuccessDelete'))
                    ->set('type', 'success')
                    ->set('url', URL::site('secret'));
        }
    }

}
