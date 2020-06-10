<?php

class Model_Person extends ORM {

    protected $_table_name = 'persons';

    protected $_table_columns = array(
        'id' => NULL,
        'name' => NULL,
        'user_id'=> NULL
    );
    
    protected $_belongs_to = array(
        'user' => array(
            'foreign_key' => 'user_id'
        )
    );
    
    protected $_has_one = array(
        'correction' => array(
            'model' => 'Correction',
            'foreign_key' => 'person_id'
        ),
        'student' => array(
            'model' => 'Student',
            'foreign_key' => 'person_id'
        )
    );

}
