<?php
/**
 * Description of POJO_Secret
 * @author EUDE LACERDA
 * @version 1.0
 * @updated 26-ago-2018 14:01:02
 */
class POJO_Secret {

    private $code;
    private $value;
    private $validity;
    private $quantity;
    private $institution;

    public function __construct() {
        $this->institution = new POJO_Institution();
    }

    public function __toString() {
        return $this->code;
    }

    public function getCode() {
        return $this->code;
    }

    public function getValue() {
        return $this->value;
    }

    public function getValidity() {
        return $this->validity;
    }

    public function getQuantity() {
        return $this->quantity;
    }

    public function getInstitution() {
        return $this->institution;
    }

    public function setCode($code) {
        $this->code = $code;
    }

    public function setValue($key) {
        $this->value = $key;
    }

    public function setValidity($validity) {
        $this->validity = $validity;
    }

    public function setQuantity($quantity) {
        $this->quantity = $quantity;
    }

    public function setInstitution($institution) {
        $this->institution = $institution;
    }

    public function GenerateKey() {
        $this->value = "PNM" . date('YmdHis');
    }

    /**
     * Método verifica se a chave está expirada por mês.
     * @return boolean
     */
    public function isExpired() {
        return (Date::formatted_time('now', 'm') == Date::formatted_time($this->validity, 'm')) ? false : true;
    }

    /**
     * Método verifica a quantidade de redações por chave.
     * @param int $quantity inteiro com a quantidade encontrada
     * @return boolean
     */
    public function quantityExceeded($quantity){
        return ($this->quantity >= $quantity) ? true : false;
    }
}
