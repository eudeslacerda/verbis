<?php

/**
 * Description of DAO_Key
 *
 * @author EUDE LACERDA
 */
class DAO_Institution {

    /**
     * A Instância ÚNICA de DAO_Institution
     * @var DAO_Institution 
     */
    private static $instance;

    /**
     * Construtor do tipo protegido previne que uma nova instância da
     * Classe seja criada através do operador `new` de fora dessa classe.
     */
    private function __construct() {
        
    }

    /**
     * Método clone do tipo privado previne a clonagem dessa instância
     * da classe
     *
     * @return void
     */
    private function __clone() {
        
    }
    
    /**
     * Método unserialize do tipo privado para prevenir a desserialização
     * da instância dessa classe.
     *
     * @return void
     */
    private function __wakeup() {
        
    }
    
    /**
     * Método responsável por instanciar o DAO_Institution
     * @return DAO_Institution
     */
    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new self();            
        }
        return self::$instance;
    }

    /**
     * Método atualiza registro
     * @param POJO_Institution $object
     */
    public function update(POJO_Institution $object) {
        try {
            $key = ORM::factory('Institution', $object->getCode())
                    ->set('institution', $object->getInstitution())
                    ->save();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Método insere um registro
     * @param POJO_Institution $object
     * @return int
     */
    public function insert(POJO_Institution $object) {
        try {
            $key = ORM::factory('Institution')
                    ->set('institution', $object->getInstitution())
                    ->save();

            return $key->id;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Método apaga o registro
     * @param int $code
     */
    public function delete($code) {
        try {
            $key = ORM::factory('institution', $code)->delete();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Método encontra um registro através de um código
     * @param int $code
     * @return POJO_Institution
     */
    public function findForCode($code) {
        try {
            $key = ORM::factory('Institution', $code)->find();
            return $this->fillKey($key);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Método retorna lista de registros
     * @return ORM
     */
    public function listInstitution() {
        try {
            return ORM::factory('Institution')->find_all();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Método preenche o objeto Key
     * @param ORM $key
     * @return POJO_Institution
     */
    private function fillKey($key) {
        $pojo = new POJO_Institution();
        
        $pojo->setCode($key->id);
        $pojo->setInstitution($key->institution);
        
        return $pojo;
    }

}
