<?php

/**
 * Description of POJO_Wording
 * @author EUDE LACERDA
 * @version 1.0
 * @created 26-ago-2018 14:01:02
 */
class POJO_Wording {

    /**
     * código da redação
     * @var int
     */
    private $code;

    /**
     * Recebe o nome do arquivo da redação
     * @var string
     */
    private $url;

    /**
     * Data do envio da redação
     * @var Date
     */
    private $insertDate;

    /**
     * Está corrigida a redação
     * @var int 
     */
    private $isCorrected;

    /**
     * Objeto da classe POJO_Student
     * @var POJO_Student
     */
    private $student;

    /**
     * Objeto da clase POJO_Secret
     * @var POJO_Secret
     */
    private $secret;

    /**
     * Objeto da classe POJO_Theme
     * @var POJO_Theme
     */
    private $theme;

    function __destruct() {
        
    }

    public function __construct() {
        $this->student = new POJO_Student();
        $this->secret = new POJO_Secret();
        $this->theme = new POJO_Theme();
    }

    public function getCode() {
        return $this->code;
    }

    public function getUrl() {
        return $this->url;
    }

    public function getInsertDate() {
        return $this->insertDate;
    }

    public function getIsCorrected() {
        return $this->isCorrected;
    }

    public function getStudent() {
        return $this->student;
    }

    public function getSecret() {
        return $this->secret;
    }

    /**
     * Método o retorna POJO_Theme
     * @return POJO_Theme
     */
    public function getTheme() {
        return $this->theme;
    }

    /**
     * 
     * @param code
     */
    public function setCode($code) {
        $this->code = $code;
    }

    /**
     * 
     * @param url
     */
    public function setUrl($url) {
        $this->url = $url;
    }

    /**
     * 
     * @param date
     */
    public function setInsertDate($date) {
        $this->insertDate = $date;
    }

    public function setIsCorrected($value){
        $this->isCorrected = $value;
    }
    
    /**
     * 
     * @param student
     */
    public function setStudent($student) {
        $this->student = $student;
    }

    /**
     * 
     * @param secret
     */
    public function setSecret($secret) {
        $this->secret = $secret;
    }

    /**
     * Método recebe POJO_Theme
     * @param POJO_Theme $theme Objeto POJO_Theme
     */
    public function setTheme($theme) {
        $this->theme = $theme;
    }

    /**
     * Método que verifica se há redação
     * @param int $quantity Quantidade de redação por pessoa
     * @return boolean
     */
    public function essayPerPerson($quantity) {
        return ($quantity < 1) ? true : false;
    }

}

?>