<?php

/**
 * Description of POJO_Correction
 * @author EUDE LACERDA
 * @version 1.0
 * @created 24-out-2018 10:17:02
 */
class POJO_Correction {

    /**
     * código da correção
     * @var int 
     */
    private $code;
    /**
     * nota da redação
     * @var float 
     */
    private $note;
    /**
     * comentários da redação
     * @var string 
     */
    private $comments;    
    /**
     * redação selecionada
     * @var int 
     */
    private $isSelected;
    /**
     * data da correção da redação
     * @var DateTime 
     */
    private $date;
    /**
     * Objeto POJO_Wording
     * @var POJO_Wording 
     */
    private $wording;
    
    /**
     * Objeto POJO_Person
     * @var POJO_Person 
     */
    private $person;
    
    public function __construct() {
        $this->wording = new POJO_Wording();
        $this->person = new POJO_Person();
    }
    
    public function getCode() {
        return $this->code;
    }

    public function getNote() {
        return $this->note;
    }

    public function getComments() {
        return $this->comments;
    }

    public function getIsSelected() {
        return $this->isSelected;
    }

    public function getDate(){
        return $this->date;
    }

    /**
     * Método retorna POJO_Wording
     * @return POJO_Wording Objeto POJO_Wording
     */
    public function getWording() {
        return $this->wording;
    }

    /**
     * Método retorna POJO_Person
     * @return POJO_Person Objeto POJO_Person
     */
    public function getPerson() {
        return $this->person;
    }
    
    public function setCode($code) {
        $this->code = $code;
    }

    public function setNote($note) {
        $this->note = $note;
    }

    public function setComments($comments) {
        $this->comments = $comments;
    }

    public function setIsSelected($isSelected) {
        $this->isSelected = ($isSelected)? TRUE : FALSE;
    }

    public function setDate($date) {
        $this->date = $date;
    }

    /**
     * Método recebe POJO_Wording
     * @param POJO_Wording $wording Objeto POJO_Wording
     */
    public function setWording($wording) {
        $this->wording = $wording;
    }
    /**
     * Método recebe POJO_Person
     * @param POJO_Person $person Objeto POJO_Person
     */
    public function setPerson($person) {
        $this->person = $person;
    }

}

?>