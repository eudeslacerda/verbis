<?php

/**
 * Classe gerencia os dados das regras de usuário.
 * @author NETIUS
 * @version 1.0
 * @updated 26-ago-2018 14:01:03
 */
class POJO_Role {

    /**
     * código da regra
     * @var int
     */
    private $code;

    /**
     * nome da Regra
     * @var string
     */
    private $name;

    /**
     * descrição da regra
     * @var string
     */
    private $description;

    /**
     * Objeto POJO_User
     * @var POJO_User
     */
    private $user;
    
    /**
     * Objeto POJO_Menu
     * @var POJO_Menu 
     */
    private $menu;

    public function __destruct() {
        
    }

    /**
     * Método construtor da classe
     */
    public function __construct() {
        $this->user = new POJO_User();
    }

    /**
     * Método retorna código da regra
     * @return int
     */
    public function getCode() {
        return $this->code;
    }

    /**
     * Retorna o nome da regra
     * @return string
     */
    public function getName() {
        return $this->name;
    }

    /**
     * Método retorna a descrição da regra.
     * @return string
     */
    public function getDescription() {
        return $this->description;
    }

    /**
     * Método retorna POJO_Menu
     * @return POJO_Menu
     */
    public function getMenu(){
        return $this->menu;
    }
    
    /**
     * Retorna o objeto POJO_User
     * @return POJO_User
     */
    public function getUser() {
        return $this->user;
    }

    /**
     * Método recebe o código da regra
     * @param int $code código da regra
     */
    public function setCode($code) {
        $this->code = $code;
    }

    /**
     * Método recebe o nome da regra
     * @param string $name nome da regra
     */
    public function setName($name) {
        $this->name = $name;
    }

    /**
     * Método recebe a descrição da regra
     * @param string $code descrição da regra
     */
    public function setDescription($description) {
        $this->description = $description;
    }

    /**
     * Método recebe POJO_Menu
     * @param POJO_Menu $menu Objeto POJO_Menu
     */
    public function addMenu(POJO_Menu $menu){
        $this->menu = $menu;        
    }
    
    /**
     * Método recebe POJO_User
     * @param POJO_User $user objeto POJO_User
     */
    public function setUser(POJO_User $user) {
        $this->user = $user;
    }

}

?>