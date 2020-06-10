<?php

class Controller_Site extends Controller_Design {

    public function action_index() {
        $pagina = View::factory("site/welcome");
        $this->addressStyles = array("storage/styles/css/sticky-footer-navbar.css", "storage/styles/css/style.css", "storage/styles/css/form-validation.css");
        $this->navigator = View::factory('template/nav');
        $this->page = $pagina;
    }

    public function action_objetivo() {
        $pagina = View::factory("site/objetivo");
        $this->addressStyles = array("storage/styles/css/sticky-footer-navbar.css", "storage/styles/css/style.css", "storage/styles/css/form-validation.css");
        $this->navigator = View::factory('template/nav');
        $this->page = $pagina;
    }

    public function action_publico() {
        $pagina = View::factory("site/publico");
        $this->addressStyles = array("storage/styles/css/sticky-footer-navbar.css", "storage/styles/css/style.css", "storage/styles/css/form-validation.css");
        $this->navigator = View::factory('template/nav');
        $this->page = $pagina;
    }

    public function action_redacao() {
        $pagina = View::factory("site/redacao");
        $this->addressStyles = array("storage/styles/css/sticky-footer-navbar.css", "storage/styles/css/style.css", "storage/styles/css/form-validation.css");
        $this->navigator = View::factory('template/nav');
        $this->page = $pagina;
    }

    public function action_chave() {

        $countKeys = ORM::factory('Secret')->count_all();
        $pagination = Pagination::factory(array(
                    'total_items' => $countKeys,
                    'items_per_page' => 5
        ));
        $keys = ORM::factory('Secret')
                ->limit($pagination->items_per_page)
                ->offset($pagination->offset)
                ->find_all();

        $this->navigator = View::factory('template/nav');

        $this->addressStyles = array("storage/styles/css/sticky-footer-navbar.css", "storage/styles/css/style.css", "storage/styles/css/form-validation.css");

        $this->page = View::factory('site/chave')
                ->set('keys', $keys)
                ->set('pagination', $pagination);
    }

}
