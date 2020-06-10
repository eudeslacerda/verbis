<?php

class Model_Role extends Model_Auth_Role {

    protected $_table_columns = array(
        'id' => NULL,
        'name' => NULL,
        'description' => NULL,
    );
    protected $_has_many = array(
        'menu' => array(
            'model' => 'Menu',
            'through' => 'roles_menus'
        )
    );

}
