<?php

class Model_Institution extends ORM {

    protected $_table_columns = array(
        'id' => NULL,
        'institution' => NULL
    );
    
   protected $_has_many = array(
        'secrets' => array(
            'model' => 'Secret',
            'foreign_key' => 'institution_id'
        ),
       'students' => array(
            'model' => 'Student',
            'foreign_key' => 'institution_id'
        )
    );

}
