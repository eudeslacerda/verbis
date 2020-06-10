<?php

/**
 * Description of DAO_Secret
 *
 * @author EUDE LACERDA
 */
class DAO_Secret {

    /**
     * A Instância ÚNICA de DAO_Secret
     * @var DAO_Secret 
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
     * Método responsável por instanciar o DAO_Secret
     * @return DAO_Secret
     */
    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new self();            
        }
        return self::$instance;
    }

    /**
     * Método atualiza registro
     * @param POJO_Secret $object
     */
    public function update(POJO_Secret $object) {
        try {
            $key = ORM::factory('Secret', $object->getCode())
                    ->set('value', $object->getValue())
                    ->set('validity', $object->getValidity())
                    ->set('quantity', $object->getQuantity())
                    ->set('institution_id', $object->getInstitution()->getCode())
                    ->save();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Método insere um registro
     * @param POJO_Secret $object
     * @return int
     */
    public function insert(POJO_Secret $object) {
        try {
            $key = ORM::factory('Secret')
                    ->set('value', $object->getValue())
                    ->set('validity', $object->getValidity())
                    ->set('quantity', $object->getQuantity())
                    ->set('institution_id', $object->getInstitution()->getCode())
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
            $secret = ORM::factory('Secret', $code)->delete();
            $rt = ORM::factory('Secret', $code)->find();
            return $rt->id;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Método encontra um registro através de um código
     * @param int $code Código da chave
     * @return POJO_Secret
     */
    public function findId($code) {
        try {
            return $this->fillSecret(ORM::factory('Secret', $code));
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Método retorna lista de registros
     * @return ORM
     */
    public function listSecret() {
        try {
            return ORM::factory('Secret')->find_all();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Método preenche o objeto Secret
     * @param ORM $object recebe o objeto da base de dados
     * @return POJO_Secret
     */
    private function fillSecret($object) {
        $obj = new POJO_Secret();
        
        $obj->setCode($object->id);
        $obj->setValue($object->value);
        $obj->setValidity($object->validity);
        $obj->setQuantity($object->quantity);
        $obj->getInstitution()->setCode($object->institution_id);
        
        return $obj;
    }

    /**
     * Método a chave na base de dados
     * @param string $secret Recebe a chave
     * @return ORM
     */
    public function secretFound($secret) {
        try {
            $object = ORM::factory('Secret')
                    ->and_where('value', '=', $secret)
                    ->find();

            return $object;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

}
