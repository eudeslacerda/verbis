<?php

class Model_Theme extends ORM {

    protected $_table_columns = array(
        'id' => NULL,
        'theme' => NULL,
        'validity' => NULL,
        'description' => NULL,
    );
    protected $_has_many = array(
        'wordings' => array(
            'model' => 'Wording',
            'foreign_key' => 'theme_id'
        )
    );

}
