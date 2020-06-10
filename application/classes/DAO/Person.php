<?php

/**
 * Description of DAO_Person
 *
 * @author EUDE LACERDA
 */
class DAO_Person {

    /**
     * A Instância ÚNICA de DAO_Person
     * @var DAO_Person 
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
     * Método responsável por instanciar o DAO_Person
     * @return DAO_Person
     */
    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new self();            
        }
        return self::$instance;
    }

    /**
     * Método atualiza registro
     * @param POJO_Person $object
     */
    public function update($object) {
        try {
            $orm = ORM::factory('Person', $object->getCode())
                    ->set('name', $object->getName())
                    ->set('user_id', $object->getUser()->getCode())
                    ->save();
            return $orm->id; 
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Método insere um registro
     * @param POJO_Person $object
     * @return int
     */
    public function insert(POJO_Person $object) {
        try {
            $obj = ORM::factory('Person')
                    ->set('name', $object->getName())
                    ->set('user_id', $object->getUser()->getCode())
                    ->save();

            return $obj->id;
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
            $key = ORM::factory('Person', $code)->delete();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Método encontra um registro através de um código
     * @param int $code
     * @return POJO_Person
     */
    public function findForCode($code) {
        try {
            $key = ORM::factory('Person', $code)->find();
            return $this->fillPerson($key);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Método retorna lista de registros
     * @return ORM
     */
    public function listPerson() {
        try {
            return ORM::factory('Person')->find_all();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Método preenche o objeto Person
     * @param ORM $key
     * @return POJO_Person
     */
    private function fillPerson($orm) {
        $pojo = new POJO_Person();
        
        $pojo->setCode($orm->id);
        $pojo->setName($orm->name);
        $pojo->getUser()->setCode($orm->user_id);
        
        return $pojo;
    }

}
