<?php
App::uses('AppModel', 'Model');
/**
 * User Model
 *
 * @property Perfil $Perfil
 * @property Group $Group
 * @property Perfil $Perfil
 */
class User extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'username';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'username' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'alphaNumeric' => array(
				'rule' => array('alphaNumeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'isUnique' => array(
					'rule' => 'isUnique',
					'message' => 'El nombre de usuario ya existe'
			)
		),
		'password' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'compararpassword' => array(
							'rule' => array('compararpassword', 'repassword'),
							'message' => 'Las claves no coinciden'
			),
		),
		'repassword' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Group' => array(
			'className' => 'Group',
			'foreignKey' => 'group_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	public $hasOne = 'Perfil';

	public function beforeSave($options = array()) {
        //Hacemos que cada vez que guarde la clave en la base de datos la hashed
        $this->data['User']['password'] = AuthComponent::password($this->data['User']['password']);
        return true;
    }


    public function compararpassword($field=array(), $compararepassword=null ){
    	foreach( $field as $key => $value ){ 
    		$var1 = $value;
    		$var2 = $this->data[$this->name][$compararepassword];
    		 if($var1 !== $var2) {
                return FALSE;
            } else {
                continue;
            } 
    	}
    	return TRUE;
    }

}
