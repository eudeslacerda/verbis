<?php

/**
 * Description of Correction
 *
 * @author eude
 */
class Model_Correction extends ORM {

    protected $_table_columns = array(
        'id' => NULL,
        'note' => NULL,
        'comments' => NULL,
        'isselected' => NULL,
        'date' => NULL,
        'wording_id' => NULL,
        'person_id' => NULL
    );
    protected $_belongs_to = array(
        'wording' => array(
            'foreign_key' => 'wording_id'
        ),
        'person' => array(
            'foreign_key' => 'person_id'
        )
    );
}
