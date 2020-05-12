<?php

/**
 * Description of DAO_Correction
 *
 * @author EUDE LACERDA
 */
class DAO_Correction {

    /**
     * A Instância ÚNICA de DAO_Correction
     * @var DAO_Correction 
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
     * Método responsável por instanciar o DAO_Correction
     * @return DAO_Correction
     */
    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * Método atualiza registro
     * @param POJO_Correction $object
     */
    public function update(POJO_Correction $object) {
        try {
            $obj = ORM::factory('Correction', $object->getCode())
                    ->set('note', $object->getNote())
                    ->set('comments', $object->getComments())
                    ->set('isselected', $object->getIsSelected())
                    ->set('date', $object->getDate())
                    ->set('wording_id', $object->getWording()->getCode())
                    ->set('person_id', $object->getPerson()->getCode())
                    ->save();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Método insere um registro
     * @param POJO_Correction $object
     * @return int
     */
    public function insert(POJO_Correction $object) {
        try {
            $orm = ORM::factory('Correction')
                    ->set('note', $object->getNote())
                    ->set('comments', $object->getComments())
                    ->set('isselected', $object->getIsSelected())
                    ->set('date', $object->getDate())
                    ->set('wording_id', $object->getWording()->getCode())
                    ->set('person_id', $object->getPerson()->getCode())
                    ->save();

            return $orm->id;
        } catch (Exception $e) {
            echo "Erro: " . $e->getCode() . " " . $e->getFile() . " " . $e->getMessage();
        }
    }

    /**
     * Método apaga o registro
     * @param int $code Recebe o código da redação
     */
    public function delete($code) {
        try {
            ORM::factory('Correction', $code)->delete();
            return ORM::factory('Correction', $code)->id;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Método encontra um registro através de um código
     * @param int $code
     * @return POJO_Correction
     */
    public function findForCode($code) {
        try {
            return $this->fillCorrection(ORM::factory('Correction', $code));
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Método retorna lista de registros
     * @return ORM
     */
    public function listCorrection() {
        try {
            return ORM::factory('Correction')->find_all();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Método preenche o objeto Correction
     * @param ORM $orm Objeto ORM
     * @return POJO_Correction Objeto POJO_Correction
     */
    private function fillCorrection($orm) {
        $pojo = new POJO_Correction();

        $pojo->setCode($orm->id);
        $pojo->setNote($orm->note);
        $pojo->setComments($orm->comments);
        $pojo->setIsSelected($orm->isselected);
        $pojo->setDate($orm->date);
        $pojo->getWording()->setCode($orm->wording_id);
        $pojo->getPerson()->setCode($orm->person_id);

        return $pojo;
    }

    /**
     * Método conta o itens da lista de registro.
     * @param ORM $list Lista de registro.
     * @return Pagination.
     */
    public function pagination($list) {
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
        return ORM::factory('Correction')
                        ->limit($pagination->items_per_page)
                        ->offset($pagination->offset)
                        ->find_all();
    }
}
