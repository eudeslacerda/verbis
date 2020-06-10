<?php

/**
 * Description of DAO_User
 *
 * @author EUDE LACERDA
 */
class DAO_User {

    /**
     * A Instância ÚNICA de DAO_User
     * @var DAO_User 
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
     * Método responsável por instanciar o DAO_User
     * @return DAO_User
     */
    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * Método atualiza um User
     * @param array $values Array de dados do form
     * @param int $codeRole Código do perfil
     * @param int $codeUser Código do Usuário
     */
    public function update($values, $codeRole, $codeUser) {
        try {
                          
            $orm = ORM::factory('User',$codeUser)
                    ->update_user($values, array('username', 'password', 'email'));
            
            $orm->remove('roles', $codeRole);
                    
            $orm->add('roles', ORM::factory('Role', array('name' => $values['typeUser'])));
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Método insere um registro
     * @param array $object Recebe um array do formulário
     * @return int
     */
    public function insert($object) {
        try {
            $user = new Model_User;

            # use the method defined in Model_User to do the validation
            $user->create_user($object, array('username', 'password', 'email'));

            # Grant user login role
            $user->add('roles', ORM::factory('Role', array('name' => $object['typeUser'])));

            return $user->id;
        } catch (PDOException $p) {
            echo $p->getMessage();
        }
    }

    /**
     * Método apaga o registro
     * @param POJO_User $user POJO_User
     */
    public function delete(POJO_User $user) {
        try {

            $orm = ORM::factory('User', $user->getCode())
                    ->remove('roles', NULL)
                    ->remove('menu', NULL)
                    ->delete();

            $user->setCode($orm->id);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Método encontra um registro através de um código
     * @param int $code Recebe o código do usuário
     * @return POJO_User Objeto POJO_User
     */
    public function findForCode($code) {
        try {
            return $this->fillUser(ORM::factory('User', $code));
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Método encontra um registro através de um código
     * @param int $code Recebe o código do usuário
     * @return ORM Objeto ORM
     */
    public function findUserForCode($code) {
        try {
            return ORM::factory('User', $code);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Método retorna lista de registros
     * @return ORM
     */
    public function listUser() {
        try {
            return ORM::factory('User')->find_all();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Método preenche o objeto User
     * @param ORM $data Linha da base de dados encontrada
     * @return POJO_User
     */
    private function fillUser($data) {
        $pojo = new POJO_User();

        $pojo->setCode($data->id);
        $pojo->setEmail($data->email);
        $pojo->setUserName($data->username);
        $pojo->setPassword($data->password);
        $pojo->setLogins($data->logins);
        $pojo->setLastLogin($data->last_login);
        $pojo->setStatus($data->status);

        return $pojo;
    }

    /**
     * Método realiza a atualizacao do status do usuário.
     * @param POJO_User $user POJO_User
     */
    public function statusUpdate(POJO_User $user) {
        try {
            $orm = ORM::factory('User', $user->getCode())
                    ->set('status', $user->getStatus())
                    ->save();
            $user->setStatus($orm->status);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Método atualiza os dados de acesso do usuário
     * @param array $values Array de dados do form
     * @param POJO_User $object Objeto POJO_User
     */
    public function updateMyAccount($values, $object) {
        try {
            $orm = ORM::factory('User')
                    ->where('id', '=', $object->getCode())
                    ->find()
                    ->update_user($values, array('username', 'password', 'email'));
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

}
