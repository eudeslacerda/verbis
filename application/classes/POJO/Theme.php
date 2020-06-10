<?php

/**
 * Classe responsável pelo gerenciamento do tema da redaçãoo.
 * @author Eude Lacerda
 * @version 1.0
 * @updated 26-ago-2018 14:01:14
 */
class POJO_Theme {

    /**
     * código do tema
     * @var int
     */
    private $code;

    /**
     * Tema da redação
     * @var string
     */
    private $theme;

    /**
     * Data de validade do tema
     * @var Date 
     */
    private $validity;

    /**
     * Descrição do tema
     * @var string 
     */
    private $description;

    /**
     * Método construtor da classe
     */
    public function __construct() {
        
    }

    function __destruct() {
        
    }

    /**
     * Metodo retorna o código do tema
     * @return int
     */
    public function getCode() {
        return $this->code;
    }

    /**
     * Método retorna a descrição do tema
     * @return string
     */
    public function getDescription() {
        return $this->description;
    }

    /**
     * Metodo retorna o tema
     * @return string
     */
    public function getTheme() {
        return $this->theme;
    }

    /**
     * Método retorna a validade do tema
     * @return Date
     */
    public function getValidity() {
        return $this->validity;
    }

    /**
     * Método recebe o código do tema
     * @param int $code Código do tema
     */
    public function setCode($code) {
        $this->code = $code;
    }

    /**
     * Método recebe a descrição do tema
     * @param string $value Descrição do tema
     */
    public function setDescription($value) {
        $this->description = $value;
    }

    /**
     * Método recebe o tema da redação
     * @param string $theme Tema da redação
     */
    public function setTheme($theme) {
        $this->theme = $theme;
    }

    /**
     * Método recebe a validade do tema
     * @param Date $date Validade do tema
     */
    public function setValidity($date) {
        $this->validity = $date;
    }

}

?>