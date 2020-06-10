<?php

defined('SYSPATH') or die('Não é permitido acesso direto!');

/**
 * Description of Pessoa
 *
 * @author eude
 */
class Model_Student extends ORM {

    protected $_table_columns = array(
        'id' => NULL,
        'serie' => NULL,
        'class'=> NULL,
        'person_id' => NULL,
        'institution_id' => NULL
    );
    
    protected $_belongs_to = array(
        'person' => array(
            'foreign_key' => 'person_id'
        ),
        'institution' => array(
            'foreign_key' => 'institution_id'
        )
    );
    
    protected $_has_many = array(
        'wordings' => array(
            'model' => 'Wording',
            'foreign_key' => 'student_id'
        )        
    );

}
