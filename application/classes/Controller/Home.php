<?php

/**
 * Description of Home
 *
 * @author eude
 */
class Controller_Home extends Controller_Design {

    public function action_index() {

        POJO_Session::getInstance()->isLogged();

        $this->addressStyles = array("storage/styles/css/sticky-footer-navbar.css", "storage/styles/css/style.css", "storage/styles/css/form-validation.css");

        $pagina = View::factory("home/home");
        
        $this->page = $pagina;
    }

}
