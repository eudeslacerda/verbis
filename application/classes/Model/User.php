<?php

/**
 * Description of User
 *
 * @author eude
 */
class Model_User extends Model_Auth_User {

    protected $_table_columns = array(
        'id' => NULL,
        'email' => NULL,
        'username' => NULL,
        'password' => NULL,
        'logins' => NULL,
        'last_login' => NULL,
        'status' => NULL
    );
    
    protected $_has_one = array(
        'person' => array(
            'model' => 'Person',
            'foreign_key' => 'user_id'
        ),
    );
}
