<?php
define( '_JEXEC', 1 );
define('JPATH_BASE', dirname(__FILE__) );//Caso o script fique na raiz do site, não precisa mecher em nada
define( 'DS', DIRECTORY_SEPARATOR );
require_once ( JPATH_BASE .DS.'includes'.DS.'defines.php' );
require_once ( JPATH_BASE .DS.'includes'.DS.'framework.php' );
$mainframe =& JFactory::getApplication('site');
$mainframe->initialise();
jimport('joomla.user.helper');

	//Dados do usuário que será Inserido manualmente no joomla
	$nome = 'Jose da Silva Testador';
	$login = 'teste';
	$email    = 'teste@teste.com.br';
	$pass = 'teste';       
	
//variavel que passa os dados para o joomla
//em groups (11) é o id do grupo do joomla que o usuario será cadastrado, mude conforme sua necessidade
    $udata = array(
        "name"=>$nome,
        "username"=>$login,
        "password"=>$pass,
        "password2"=>$pass,
        "email"=>$email,
        "block"=>0,
        "groups"=>array("11")
    );

    $user = new JUser;

    //Write to database
    if(!$user->bind($udata)) {
      throw new Exception("Could not bind data. Error: " . $user->getError());
    }
    if (!$user->save()) {
      throw new Exception("Could not save user. Error: " . $user->getError());
    }

    $new_user_id = $user->id;

    echo $output;
?>
