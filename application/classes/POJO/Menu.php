<?php

/**
 * Classe responsável por gerenciamento os dados dos menus.
 * @author NETIUS
 * @version 1.0
 * @updated 26-ago-2018 14:01:03
 */
class POJO_Menu {

    /**
     * Recebe o código do menu
     * @var int
     */
    private $code;
    
    /**
     * Código do menu pai
     * @var int 
     */
    private $parent;

    /**
     * Nome do menu
     * @var string
     */
    private $menu;

    /**
     * Endereço do menu
     * @var string 
     */
    private $address;
    
    /**
     * Ordem do menu
     * @var int 
     */
    private $ordinance;
    
    /**
     * Status do menu
     * @var int 
     */
    private $published;

    /**
     * Objeto da classe POJO_Role
     * @var POJO_Role
     */
    private $role;

    public function __destruct() {
        
    }

    /**
     * Método construtor da classe
     * @return void
     */
    public function __construct() {
        $this->role = new POJO_Role();
    }

    /**
     * Método retorna a ordem do menu
     * @return int
     */
    public function getOrdinance() {
        return $this->ordinance;
    }

    /**
     * Método retorna o status do menu
     * @return int
     */
    public function getPublished() {
        return $this->published;
    }

    /**
     * Método recebe a ordem do menu
     * @param int $ordinance Ordem do menu
     */
    public function setOrdinance($ordinance) {
        $this->ordinance = $ordinance;
    }

    /**
     * Método recebe o status do menu
     * @param int $published Status do menu
     */
    public function setPublished($published) {
        $this->published = ($published) ? true : false;
    }
    
    /**
     * Método retorna o código do menu
     * @return int
     */
    public function getCode() {
        return $this->code;
    }

    /**
     * Méotodo retorna o nome do menu
     * @return string
     */
    public function getMenu() {
        return $this->menu;
    }

    /**
     * Método retorna o endereço do menu
     * @return string
     */
    public function getAddress() {
        return $this->address;
    }

    /**
     * Método o objeto POJO_Role
     * @return POJO_Role
     */
    public function getRole() {
        return $this->role;
    }
    
    /**
     * Método retorna código do menu pai
     * @return int
     */
    public function getParent(){
        return $this->parent;
    }

    /**
     * Método recebe o código do menu
     * @param int $code Código do menu
     */
    public function setCode($code) {
        $this->code = $code;
    }

    /**
     * Método recebe o nome do menu
     * @param string $menu Nome do menu
     */
    public function setMenu($menu) {
        $this->menu = $menu;
    }

    /**
     * O método recebe o endereço do menu
     * @param string $address Endereço do menu
     */
    public function setAddress($address) {
        $this->address = $address;
    }

    /**
     * Metodo recebe o objeto POJO_Role
     * @param POJO_Role $role Objeto POJO_Role
     */
    public function setRole(POJO_Role $role) {
        $this->role = $role;
    }
    
    /**
     * Método recebe o código do menu pai
     * @param int $parent Código do menu pai
     */
    public function setParent($parent){
        $this->parent = $parent;
    }

}

?>