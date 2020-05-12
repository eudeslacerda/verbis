<?php

defined('SYSPATH') OR die('Não é permitido acesso direto.');

/**
 * Description of Roles_User
 *
 * @author eude
 */
class Model_Roles_Users extends ORM {

    protected $_table_columns = array(
        'user_id' => NULL,
        'role_id' => NULL
    );
    protected $_table_name = 'roles_users';

}
