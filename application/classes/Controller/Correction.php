<?php

class Controller_Correction extends Controller_Design {

    public function action_index() {

        POJO_Session::getInstance()->isLogged();

        $this->addressStyles = array("storage/styles/css/sticky-footer-navbar.css", "storage/styles/css/style.css", "storage/styles/css/form-validation.css");

        $correctionDAO = DAO_Correction::getInstance();

        $pagination = $correctionDAO->pagination($correctionDAO->listCorrection());

        $this->page = View::factory('correction/list')
                ->set('corrections', $correctionDAO->paginationList($pagination))
                ->set('pagination', $pagination);
    }

    public function action_wordings() {
        POJO_Session::getInstance()->isLogged();

        $this->addressStyles = array("storage/styles/css/sticky-footer-navbar.css", "storage/styles/css/style.css", "storage/styles/css/form-validation.css");

        $wordingDAO = DAO_Wording::getInstance();

        $pagination = $wordingDAO->pagination($wordingDAO->uncorrectedList()->count());

        $this->page = View::factory('correction/correct/list')
                ->set('wordings', $wordingDAO->paginationList($pagination))
                ->set('pagination', $pagination);
    }

    public function action_correct() {
        POJO_Session::getInstance()->isLogged();

        $this->addressStyles = array("storage/styles/css/sticky-footer-navbar.css", "storage/styles/css/style.css", "storage/styles/css/form-validation.css");

        $correction = new POJO_Correction();

        $correction->getWording()->setCode($this->request->param('id'));

        if (HTTP_Request::POST == $this->request->method()) {

            $correction->setNote($this->request->post('txtNote'));
            $correction->setComments($this->request->post('txtComments'));
            $correction->getWording()->setIsCorrected(TRUE);
            $correction->setDate(Date::formatted_time());
            $correction->setIsSelected($this->request->post('chkSelect'));
            $correction->getPerson()->setCode(DAO_User::getInstance()->findUserForCode(Auth::instance()->get_user())->person->id);

            $wordingDAO = DAO_Wording::getInstance();
            $correctionDAO = DAO_Correction::getInstance();

            $wordingDAO->isCorrected($correction->getWording());

            if ($correctionDAO->insert($correction)) {
                $this->alert('success', 'correction.save', 'success', 'correction/wordings');
            }
        } else {

            $wordingDAO = DAO_Wording::getInstance();

            $this->actionForm = URL::site('correction/correct/' . $correction->getWording()->getCode());

            $this->page = View::factory('correction/correct/correct')
                    ->set('wording', $wordingDAO->findWordingForCode($correction->getWording()));
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
    
    public function action_teste(){
        POJO_Session::getInstance()->isLogged();
        echo DAO_User::getInstance()->findUserForCode(Auth::instance()->get_user())->person->id;
        //echo Auth::instance()->get_user();
    }

}
