<?php

/**
 * Description of DAO_Student
 *
 * @author EUDE LACERDA
 */
class DAO_Student {

    /**
     * A Instância ÚNICA de DAO_Student
     * @var DAO_Student 
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
     * Método responsável por instanciar o DAO_Student
     * @return DAO_Student
     */
    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new self();            
        }
        return self::$instance;
    }

    /**
     * Método atualiza registro
     * @param POJO_Student $object
     */
    public function update(POJO_Student $object) {
        try {
            $obj = ORM::factory('Student', $object->getCode())
                    ->set('serie', $object->getSerie())
                    ->set('class', $object->getClass())
                    ->set('person_id', $object->getPerson()->getCode())
                    ->set('institution_id', $object->getInstitution()->getCode())
                    ->save();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Método insere um registro
     * @param POJO_Student $object
     * @return int
     */
    public function insert(POJO_Student $object) {
        try {
            $obj = ORM::factory('Student')
                    ->set('serie', $object->getSerie())
                    ->set('class', $object->getClass())
                    ->set('person_id', $object->getPerson()->getCode())
                    ->set('institution_id', $object->getInstitution()->getCode())
                    ->save();

            return $obj->id;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Método apaga o registro
     * @param int $code
     */
    public function delete($code) {
        try {
            $key = ORM::factory('Student', $code)->delete();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Método encontra um registro através de um código
     * @param int $code
     * @return POJO_Student
     */
    public function findForCode($code) {
        try {
            $key = ORM::factory('Student', $code)->find();
            return $this->fillStudent($key);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Método retorna lista de registros
     * @return ORM
     */
    public function listStudent() {
        try {
            return ORM::factory('Student')->find_all();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Método preenche o objeto Student
     * @param ORM $key
     * @return POJO_Student
     */
    private function fillStudent($key) {
        $pojo = new POJO_Student();
        
        $pojo->setCode($key->id);
        $pojo->setSerie($key->serie);
        $pojo->setClass($key->class);
        $pojo->getInstitution()->setCode($key->institution_id);
        $pojo->getPerson()->setCode($key->person_id);
        
        return $pojo;
    }

}
