<?php

/**
 * Description of POJO_User
 * @author EUDE LACERDA
 * @version 1.0
 * @updated 26-ago-2018 14:01:02
 */
class POJO_User {
    
    private $code;
    private $userName;
    private $email;
    private $password;
    private $logins;
    private $lastLogin;
    private $status;
       
    public function getCode() {
        return $this->code;
    }
  
    public function getUserName() {
        return $this->userName;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getLogins() {
        return $this->logins;
    }

    public function getLastLogin() {
        return $this->lastLogin;
    }
    
    public function getStatus(){
        return $this->status;
    }

    public function setCode($code) {
        $this->code = $code;
    }

    public function setUserName($userName) {
        $this->userName = $userName;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function setLogins($logins) {
        $this->logins = $logins;
    }

    public function setLastLogin($lastLogin) {
        $this->lastLogin = $lastLogin;
    }
    
    public function setStatus($status){
        $this->status = $status;
    }
}
