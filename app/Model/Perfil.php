<?php
App::uses('AppModel', 'Model');
/**
 * Perfil Model
 *
 * @property User $User
 */
class Perfil extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'email' => array(
			'email' => array(
				'rule' => array('email'),
				'message' => 'El email no es correcto',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'isUnique' => array(
				'rule' => 'isUnique',
				'message' => 'Esta direccion de correo ya existe'
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
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	function afterFind($resultados, $primary = false) {
    	//Integracion de gravatar
    	//Si el usuario no tiene avatar propio en el blog
    	//buscara en la web de gravatar
    	foreach ($resultados as $clave => $valor) {
    		if(isset($valor['Perfil']['avatar']) and $valor['Perfil']['avatar']==""){
    			$resultados[$clave]['Perfil']['avatar']="http://www.gravatar.com/avatar/".md5(strtolower(trim($valor['Perfil']['email'])))."?d=http://www.agdpvigo.net/img/useranon.png&s=60";
    			//$resultados[$clave]['Perfil']['avatar']='gravatar';
    		}
    	}
    	return $resultados;
    }
}
