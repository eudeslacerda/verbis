<?php

/**
 * Description of POJO_Institution
 * @author EUDE LACERDA
 * @version 1.0
 * @updated 26-ago-2018 14:01:02
 */
class POJO_Institution {
    
    private $code;
    private $institution;
        
    public function getCode() {
        return $this->code;
    }

    public function getInstitution() {
        return $this->institution;
    }

    public function setCode($code) {
        $this->code = $code;
    }

    public function setInstitution($institution) {
        $this->institution = $institution;
    }

}
