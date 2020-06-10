<?php

/**
 * Description of POJO_Student
 * @author EUDE LACERDA
 * @version 1.0
 * @updated 26-ago-2018 14:01:02
 */
class POJO_Student {
    
    private $code;
    private $serie;
    private $class;
    private $person;
    private $institution;
    
    public function __construct() {
        $this->person = new POJO_Person();
        $this->institution = new POJO_Institution();
    }
    
    public function getCode() {
        return $this->code;
    }

    public function getSerie() {
        return $this->serie;
    }

    public function getClass() {
        return $this->class;
    }

    /**
     * Método retorna POJO_Person
     * @return POJO_Person Objeto POJO_Person
     */
    public function getPerson() {
        return $this->person;
    }

    /**
     * Método retorna POJO_Institution
     * @return POJO_Institution Objeto POJO_Institution
     */
    public function getInstitution() {
        return $this->institution;
    }

    public function setCode($code) {
        $this->code = $code;
    }

    public function setSerie($serie) {
        $this->serie = $serie;
    }

    public function setClass($class) {
        $this->class = $class;
    }

    /**
     * Método recebe POJO_Person
     * @param POJO_Person $person Objeto POJO_Person
     */
    public function setPerson($person) {
        $this->person = $person;
    }

    /**
     * Método recebe POJO_Institution
     * @param POJO_Institution $institution Objeto POJO_Institution
     */
    public function setInstitution($institution) {
        $this->institution = $institution;
    }
}
