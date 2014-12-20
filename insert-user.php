<?php
define( '_JEXEC', 1 );
define('JPATH_BASE', dirname(__FILE__) . '../../../../../' ); //Caso utilize na raiz do site retirar . '../../../../../'
define( 'DS', DIRECTORY_SEPARATOR );
require_once ( JPATH_BASE .DS.'includes'.DS.'defines.php' );
require_once ( JPATH_BASE .DS.'includes'.DS.'framework.php' );
$mainframe = JFactory::getApplication('site');
$mainframe->initialise();
jimport('joomla.user.helper');

	//Dados do usuário que será Inserido manualmente no joomla
	$nome = 'Jose Testador da Silva';
	$login = 'teste';
	$email    = 'teste@teste.com.br';
	$pass = 'teste';       
	
//Variavel que passa os dados para o joomla
//Em groups (11) é o id do grupo do joomla que o usuario será cadastrado, mude conforme sua necessidade
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

    try
	{
		//Write to database
		if(!$user->bind($udata)) {
		  $success = 'false';
	      $msg = 'Could not bind data. Error: ' . $user->getError();
		}
		
		if (!$user->save()) {
		  $success = 'false';
		  $msg = 'Could not save user. Error: ' . $user->getError();
		}
	}
	catch (RuntimeException $e)
	{
		$success = 'false';
		$msg = 'Erro desconhecido: ' . $e.getMessage();
	}

	if ($success == 'true')
	{
		$new_user_id = $user->id;
		$success = 'true';
		$msg = 'Usuário cadastrado com sucesso';
	}
	//Pegando retorno REST na integração com um sistema
	//echo '<retorno><success>' . $success . '</success><msg>' . $msg . '</msg></retorno>';
}
?>