<?php

class DAO_Theme {

    /**
     * A Instância ÚNICA de DAO_Theme
     * @var DAO_Theme 
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
     * Método responsável por instanciar o DAO_Theme
     * @return DAO_Theme
     */
    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new self();            
        }
        return self::$instance;
    }

    /**
     * Método atualiza registro
     * @param POJO_Theme $object
     */
    public function update(POJO_Theme $object) {
        try {
            $obj = ORM::factory('Theme', $object->getCode())
                    ->set('theme', $object->getTheme())
                    ->set('validity', $object->getValidity())
                    ->set('description', $object->getDescription())
                    ->save();
            
            return $obj->id;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Método insere um registro
     * @param POJO_Theme $object
     * @return int
     */
    public function insert(POJO_Theme $object) {
        try {
            $obj = ORM::factory('Theme')
                    ->set('theme', $object->getTheme())
                    ->set('validity', $object->getValidity())
                    ->set('description', $object->getDescription())
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
            ORM::factory('Theme', $code)->delete();
            return ORM::factory('Theme', $code)->id;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Método encontra um registro através de um código
     * @param int $code
     * @return POJO_Theme
     */
    public function findForCode($code) {
        try {
            return $this->fillTheme(ORM::factory('Theme', $code));
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Método retorna lista de registros
     * @return ORM
     */
    public function listTheme() {
        try {
            return ORM::factory('Theme')->find_all();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Método preenche o objeto Theme
     * @param ORM $orm Objeto ORM
     * @return POJO_Theme
     */
    private function fillTheme($orm) {
        $theme = new POJO_Theme();

        $theme->setCode($orm->id);
        $theme->setTheme($orm->theme);
        $theme->setValidity($orm->validity);
        $theme->setDescription($orm->description);
        
        return $theme;
    }

}
