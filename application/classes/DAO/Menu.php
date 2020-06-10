<?php

class DAO_Menu {

    /**
     * A Instância ÚNICA de DAO_Menu
     * @var DAO_Menu 
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
     * Método responsável por instanciar o DAO_Menu
     * @return DAO_Menu
     */
    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new self();            
        }
        return self::$instance;
    }

    /**
     * Método atualiza registro
     * @param POJO_Menu $object Objeto POJO_Menu
     */
    public function update(POJO_Menu $object) {
        try {
            $person = ORM::factory('Menu', $object->getCode())
                    ->set('parent', $object->getParent())
                    ->set('menu', $object->getMenu())
                    ->set('address', $object->getAddress())
                    ->set('ordinance', $object->getOrdinance())
                    ->set('published', $object->getPublished())
                    ->save();
            return $person->id;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Método insere um registro
     * @param POJO_Menu $object Objeto POJO_Menu
     * @return int
     */
    public function insert($object) {
        try {
            $user = ORM::factory('Menu')
                    ->set('parent', $object->getParent())
                    ->set('menu', $object->getMenu())
                    ->set('address', $object->getAddress())
                    ->set('ordinance', $object->getOrdinance())
                    ->set('published', $object->getPublished())
                    ->save();

            return $user->id;
        } catch (PDOException $p) {
            echo $p->getMessage();
        } catch (ORM_Validation_Exception $e) {
            echo $e->getMessage();
        } catch (Exception $error) {
            echo $error->getMessage();
        }
    }

    /**
     * Método apaga o registro
     * @param int $code Código do Menu
     */
    public function delete($code) {
        try {
            $key = ORM::factory('Menu', $code)->delete();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Método encontra um registro através de um código
     * @param int $code Código do Menu
     * @return POJO_Menu
     */
    public function findForCode($code) {
        try {
            $registry = ORM::factory('Menu', $code);
            return $this->fillMenu($registry);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Método encontra um registro através de um código
     * @param int $code Código do Menu
     * @return ORM
     */
    public function findMenuForCode($code) {
        try {
            return $this->fillMenu(ORM::factory('Menu', $code));
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Método retorna lista de registros
     * @param string $fieldOrder Nome do campo para ordernação 
     * @return ORM
     */
    public function listMenu($fieldOrder = NULL) {
        try {
            return (!empty($fieldOrder)) ? ORM::factory('Menu')->order_by($fieldOrder)->find_all() : ORM::factory('Menu')->find_all();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Método preenche o objeto POJO_Menu
     * @param ORM $data Resultado do ORM
     * @return POJO_Menu
     */
    private function fillMenu($data) {
        $pojo = new POJO_Menu();

        $pojo->setCode($data->id);
        $pojo->setParent($data->parent);
        $pojo->setMenu($data->menu);
        $pojo->setAddress($data->address);
        $pojo->setOrdinance($data->ordinance);
        $pojo->setPublished($data->published);

        return $pojo;
    }

}
