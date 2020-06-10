<?php

class Model_Secret extends ORM {

    protected $_table_columns = array(
        'id' => NULL,
        'value' => NULL,
        'validity' => NULL,
        'quantity' => NULL,
        'institution_id'=> NULL
    );
    
    protected $_belongs_to = array(
        'institution' => array(
            'foreign_key' => 'institution_id'
        )
    );
    
    protected $_has_many = array(
        'wordings' => array(
            'model' => 'Wording',
            'foreign_key' => 'secret_id'
        )
    );

}
