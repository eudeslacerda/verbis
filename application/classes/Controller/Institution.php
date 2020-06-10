<?php

/**
 * Description of Chave
 *
 * @author EUDE LACERDA
 */
class Controller_Institution extends Controller_Design{

    public function action_index() {

        POJO_Session::getInstance()->isLogged();
        
        $this->addressStyles = array("storage/styles/css/sticky-footer-navbar.css", "storage/styles/css/style.css","storage/styles/css/form-validation.css");

        $dao = DAO_Institution::getInstance();
        
        $pagination = $dao->pagination($dao->listInstitution());
        
        $this->page = View::factory('institution/list')
        ->set('institutions', $dao->paginationList($pagination))
        ->set('pagination', $pagination);
    }

    public function action_new() {
        
        POJO_Session::getInstance()->isLogged();
        
        $this->addressStyles = array("storage/styles/css/sticky-footer-navbar.css", "storage/styles/css/style.css", "storage/styles/css/form-validation.css");
        
        if (HTTP_Request::POST == $this->request->method()) {
            
            $institution = new POJO_Institution();
            
            $institution->setInstitution($this->request->post('txtInstitution'));
            
            $institution->setCode(DAO_Institution::getInstance()->insert($institution));
            
            if ($institution->getCode()) {
                $this->alert('success', 'institution.save', 'success', 'institution');
            }
        } else {
            
            $url = 'institution/new';
            
            $this->actionForm = URL::site($url);
            
            $this->page = View::factory($url);
        }
    }

    public function action_update() {
        
        POJO_Session::getInstance()->isLogged();
        
        $this->addressStyles = array("storage/styles/css/sticky-footer-navbar.css", "storage/styles/css/style.css", "storage/styles/css/form-validation.css");
        
        $institution = new POJO_Institution();
        
        $institution->setCode($this->request->param('id'));
        
        if (HTTP_Request::POST == $this->request->method()) {
            
            $institution->setInstitution($this->request->post('txtInstitution'));
            
            DAO_Institution::getInstance()->update($institution);
            
            if ($institution->getCode()) {
                $this->alert('success', 'institution.update', 'success', 'institution');
            }
        } else {
            
            $url = 'institution/update';
            
            $this->actionForm = URL::site($url . '/' . $institution->getCode());
            
            $this->page = View::factory($url)
            ->set('institution', DAO_Institution::getInstance()->findInstitutionForCode($institution->getCode()));
        }
    }
    
    public function action_delete() {

        POJO_Session::getInstance()->isLogged();
        
        if (is_null(DAO_Institution::getInstance()->delete($this->request->param('id')))) {
            $this->addressStyles = array("storage/styles/css/sticky-footer-navbar.css", "storage/styles/css/style.css", "storage/styles/css/form-validation.css");
            $this->alert('success', 'institution.delete', 'success', 'institution');
        }else{
            echo "Não foi apagado!";
        }
    }

}
