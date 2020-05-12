<?php

class Model_Menu extends ORM {

    protected $_table_columns = array(
        'id' => NULL,
        'parent' => NULL,
        'menu' => NULL,
        'address' => NULL,
        'ordinance' => NULL,
        'published' => NULL
    );
    protected $_has_many = array(
        'role' => array(
            'model' => 'Role',
            'through' => 'roles_menus'
        )
    );

}
