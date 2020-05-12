<?php

defined('SYSPATH') or die('Não é permitido acesso direto!');

/**
 * Description of Pessoa
 *
 * @author eude
 */
class Model_Wording extends ORM {

    protected $_table_columns = array(
        'id' => NULL,
        'url' => NULL,
        'insertdate' => NULL,
        'iscorrected' => NULL,
        'secret_id' => NULL,
        'student_id' => NULL,
        'theme_id' => NULL
    );
    protected $_has_one = array(
        'correction' => array(
            'model' => 'Correction',
            'foreign_key' => 'wording_id'
        )
    );
    protected $_belongs_to = array(
        'secret' => array(
            'foreign_key' => 'secret_id'
        ),
        'student' => array(
            'foreign_key' => 'student_id'
        ),
        'theme' => array(
            'foreign_key' => 'theme_id'
        ),
    );

}
