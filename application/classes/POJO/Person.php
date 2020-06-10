<?php

/**
 * Description of POJO_Person
 * @author EUDE LACERDA
 * @version 1.0
 * @updated 26-ago-2018 14:01:02
 */
class POJO_Person {
    
    private $code;
    private $name;
    private $user;
    
    public function __construct() {
        $this->user = new POJO_User();
    }

    public function getCode() {
        return $this->code;
    }

    public function getName() {
        return $this->name;
    }

    /**
     * Método retorna POJO_User
     * @return POJO_User Objeto POJO_User
     */
    public function getUser() {
        return $this->user;
    }

    public function setCode($code) {
        $this->code = $code;
    }

    public function setName($name) {
        $this->name = $name;
    }

    /**
     * Método recebe POJO_User
     * @param POJO_User $user Objeto POJO_User
     */
    public function setUser($user) {
        $this->user = $user;
    }
}
