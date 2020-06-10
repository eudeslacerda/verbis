<?php

/**
 * Description of DAO_Wording
 *
 * @author EUDE LACERDA
 */
class DAO_Wording {

    /**
     * A Instância ÚNICA de DAO_Wording
     * @var DAO_Wording 
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
     * Método responsável por instanciar o DAO_Wording
     * @return DAO_Wording
     */
    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * Método atualiza registro
     * @param POJO_Wording $object
     */
    public function update(POJO_Wording $object) {
        try {
            $obj = ORM::factory('Wording', $object->getCode())
                    ->set('url', $object->getUrl())
                    ->set('insertdate', $object->getInsertDate())
                    ->set('iscorrected', $object->getIsCorrected())
                    ->set('secret_id', $object->getSecret()->getCode())
                    ->set('student_id', $object->getStudent()->getCode())
                    ->set('theme_id', $object->getTheme()->getCode())
                    ->save();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Método insere um registro
     * @param POJO_Wording $object
     * @return int
     */
    public function insert(POJO_Wording $object) {
        try {
            $obj = ORM::factory('Wording')
                    ->set('url', $object->getUrl())
                    ->set('insertdate', $object->getInsertDate())
                    ->set('iscorrected', $object->getIsCorrected())
                    ->set('secret_id', $object->getSecret()->getCode())
                    ->set('student_id', $object->getStudent()->getCode())
                    ->set('theme_id', $object->getTheme()->getCode())
                    ->save();

            return $obj->id;
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
            ORM::factory('Wording', $code)->delete();
            return ORM::factory('Wording', $code)->id;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Método encontra um registro através de um código
     * @param int $code
     * @return POJO_Wording
     */
    public function findForCode($code) {
        try {
            return $this->fillWording(ORM::factory('Wording', $code));
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Método retorna uma redação.
     * @param POJO_Wording $object Objeto POJO_Wording
     * @return ORM Objeto ORM
     */
    public function findWordingForCode($object) {
        try {
            return ORM::factory('Wording', $object->getCode());
        } catch (PDOException $e) {
            echo $e->getTraceAsString();
        }
    }

    /**
     * Método retorna lista de registros
     * @return ORM
     */
    public function listWording() {
        try {
            return ORM::factory('Wording')->find_all();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Método preenche o objeto Wording
     * @param ORM $key
     * @return POJO_Wording
     */
    private function fillWording($key) {
        $pojo = new POJO_Wording();

        $pojo->setCode($key->id);
        $pojo->setUrl($key->url);
        $pojo->setInsertDate($key->insertdate);
        $pojo->setIsCorrected($key->iscorrected);
        $pojo->getSecret()->getCode($key->secret_id);
        $pojo->getStudent()->getCode($key->student_id);
        $pojo->getTheme()->getCode($key->theme_id);

        return $pojo;
    }

    /**
     * Método alterar status da redação para corrigida
     * @param POJO_Wording $object Objeto POJO_Wording
     */
    public function isCorrected($object) {
        try {
            ORM::factory('Wording', $object->getCode())
                    ->set('iscorrected', $object->getIsCorrected())
                    ->save();
        } catch (PDOException $e) {
            echo $e->getTraceAsString();
        }
    }

    /**
     * Método retorna lista de redação não corrigidas.
     * @return ORM Lista de redação não corrigidas
     */
    public function uncorrectedList() {
        try {
            return ORM::factory('Wording')->where('iscorrected', '=', 0)->find_all();
        } catch (PDOException $e) {
            echo $e->getTraceAsString();
        }
    }

    /**
     * Método conta o itens da lista de registro.
     * @param int $quantity Lista de registro.
     * @return Pagination.
     */
    public function pagination($quantity) {
        return Pagination::factory(array(
                    'total_items' => $quantity,
                    'items_per_page' => 5
        ));
    }

    /**
     * Método retorna a lista Pagination
     * @param Pagination $pagination Objeto Pagination
     * @return ORM Objeto ORM
     */
    public function paginationList($pagination) {
        return ORM::factory('Wording')
                        ->where('iscorrected', '=', 0)
                        ->limit($pagination->items_per_page)
                        ->offset($pagination->offset)
                        ->find_all();
    }

    /**
     * Método retorna ORM com lista com redações selecionadas.
     * @return ORM Objeto ORM Lista de Redação
     */
    public function wordingListSelected() {
        try {
            return ORM::factory('Wording')->join('corrections')->on('wording.id', '=', 'wording_id')->where('iscorrected', '=', 1)->and_where('isselected', '=', 1);
        } catch (PDOException $e) {
            echo $e->getTraceAsString();
        }
    }

}
