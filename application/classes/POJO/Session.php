<?php

/**
 * Description of Session
 * @author EUDE LACERDA
 * @version 1.0
 * @updated 26-ago-2018 14:01:02
 */
class POJO_Session {

    public static $instance;

    private function __construct() {
        
    }

    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new POJO_Session();
            return self::$instance;
        }
    }

    public function isLogged(){
        if(!Auth::instance()->logged_in()){
            HTTP::redirect('auth');
        }
    }
}
