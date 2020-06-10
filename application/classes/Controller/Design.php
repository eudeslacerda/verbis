<?php

/**
 * Controller que modelo padrão de template para o sistema
 *
 * @author eude
 * @version 1.0
 * @access public
 */
class Controller_Design extends Controller_Template {

    /**
     * Nome do software
     * @var string 
     */
    public $appName;

    /**
     * Recebe os direitos autorais
     * @var string 
     */
    public $copyRight;

    /**
     * Recebe a view a ser carregada
     * @var string 
     */
    public $page;

    /**
     * Recebe o view a ser do rodapé
     * @var string 
     */
    public $footer;

    /**
     * Recebe o conteúdo do template
     * @var string 
     */
    public $contents;

    /**
     * Recebe os javascript
     * @var string 
     */
    public $javascript;

    /**
     * Recebe o endereço dos arquivos javascript
     * @var string 
     */
    public $addressJavascript;

    /**
     * recebe a página de login
     * @var string 
     */
    public $login;

    /**
     * Recebe a página com estilos
     * @var string 
     */
    public $styles;

    /**
     * Recebe o endereço dos estilos
     * @var mixed 
     */
    public $addressStyles;

    /**
     * Recebe o tipo da mensagem e a mensagem
     * @var string 
     */
    public $messege;

    /**
     * Recebe o endereço do action do formulário
     * @var string 
     */
    public $actionForm;

    /**
     * Recebe o endereço da logo do sistema
     * @var string 
     */
    public $logo;

    /**
     * Recebe o titulo da página
     * @var string 
     */
    public $titlePage;

    /**
     * Recebe a barra de navegação
     * @var string 
     */
    public $navigator;

    public function before() {
        parent::before();

        $this->appName = Kohana::message('app', 'name');
        $this->copyRight = Kohana::message('app', 'copyright');
        $this->footer = View::factory("template/footer");
        $this->javascript = View::factory("template/javascript");
        $this->contents = View::factory("template/container");
        $this->styles = View::factory("template/styles");
        $this->navigator = View::factory("template/software/nav");
        $this->addressStyles = array("storage/styles/css/form-validation.css");
        $this->itensMenu = $this->fillMenu();
        

        View::bind_global("appName", $this->appName);
        View::bind_global("copyright", $this->copyRight);
        View::bind_global("page", $this->page);
        View::bind_global("footer", $this->footer);
        View::bind_global("javascript", $this->javascript);
        View::bind_global("addressJavascript", $this->addressJavascript);
        View::bind_global("contents", $this->contents);
        View::bind_global("styles", $this->styles);
        View::bind_global("addressStyles", $this->addressStyles);
        View::bind_global("messege", $this->messege);
        View::bind_global("actionForm", $this->actionForm);
        View::bind_global("logo", $this->logo);
        View::bind_global("titlePage", $this->titlePage);
        View::bind_global("navigator", $this->navigator);
        View::bind_global('itensMenu', $this->itensMenu);

        $this->template->render('template');
    }

    public function after() {
        parent::after();
    }

    /**
     * Método que aplica a execução do alert.
     * @param string $type Tipo da Mensagem: warning, success, information e etc. 
     * @param string $messegeKey A chave da mensagem.
     * @param string $messegeFile O arquivo que possui a mensagem.
     * @param string $url O endereço de redirecimento
     */
    protected function alert($type, $messegeKey, $messegeFile, $url) {
        $this->page = View::factory('template/alert')
                ->set('messege', Kohana::message($messegeFile, $messegeKey))
                ->set('type', $type)
                ->set('url', URL::site($url));
    }

    private function fillMenu() { 
        $roleDAO = DAO_Role::getInstance();
        $userDAO = DAO_User::getInstance();
        foreach ($userDAO->findUserForCode(Auth::instance()->get_user())->roles->find_all() as $value)
            return $roleDAO->findForCode($value->id)->menu->find_all();
    }

}
