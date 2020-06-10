<?php

class DAO_Role {

    /**
     * A Instância ÚNICA de DAO_Role
     * @var DAO_Role 
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
     * Método responsável por instanciar o DAO_Role
     * @return DAO_Role
     */
    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new self();            
        }
        return self::$instance;
    }

    /**
     * Método atualiza registro
     * @param POJO_Role $object
     * 
     */
    public function update(POJO_Role $object) {
        try {
            $orm = ORM::factory('Role', $object->getCode())
                    ->set('name', $object->getName())
                    ->set('description', $object->getDescription())
                    ->save();
            $object->setCode($orm->id);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Método insere um registro
     * @param POJO_Role $object Objeto da classe POJO_Role
     * @return int
     */
    public function insert($object) {
        try {
            $user = ORM::factory('Role')
                    ->set('name', $object->getName())
                    ->set('description', $object->getDescription())
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
     * @param POJO_Role $object Objeto POJO_Role     
     */
    public function delete(POJO_Role $object) {
        try {
            $orm = ORM::factory('Role', $object->getCode())->delete();
            $object->setCode($orm->id);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Método encontra um registro através de um código
     * @param int $code Recebe o código do usuário
     * @return ORM
     */
    public function findForCode($code) {
        try {
            return ORM::factory('Role', $code);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Método encontra um registro através de um código
     * @param int $code Recebe o código do usuário
     * @return POJO_Role
     */
    public function findRoleForCode($code) {
        try {
            return $this->fillRole(ORM::factory('Role', $code));
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Método retorna lista de registros
     * @return ORM
     */
    public function listRole() {
        try {
            return ORM::factory('Role')->find_all();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Método preenche o objeto Role
     * @param ORM $data Linha da base de dados encontrada
     * @return POJO_Role
     */
    private function fillRole($data) {
        $pojo = new POJO_Role();

        $pojo->setCode($data->id);
        $pojo->setName($data->name);
        $pojo->setDescription($data->description);

        return $pojo;
    }

    /**
     * Método conta o itens da lista de registro.
     * @param ORM $list Lista de registro.
     * @return Pagination.
     */
    public function pagination($list){
        return Pagination::factory(array(
                    'total_items' => $list->count(),
                    'items_per_page' => 5
        ));
    }
    
    /**
     * Método retorna a lista Pagination
     * @param Pagination $pagination Objeto Pagination
     * @return ORM Objeto ORM
     */
    public function paginationList($pagination) {
        return ORM::factory('Role')
                        ->limit($pagination->items_per_page)
                        ->offset($pagination->offset)
                        ->find_all();
    }

    public function permissions(POJO_Role $role) {

        $orm = ORM::factory('Role', $role->getCode());
        if (is_null($role->getMenu()->getCode())) {
            $orm->remove('menu', $role->getMenu()->getCode());
        } else {
            $orm->remove('menu', NULL);
            $orm->add('menu', $role->getMenu()->getCode());
        }
    }

}
