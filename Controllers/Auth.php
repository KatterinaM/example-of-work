<?php

namespace Controllers;

use Core\ModelAuth;
use Models\Users;
use Models\Sessions;


class Auth extends Client{
	protected $modelAuth;
	protected $mUsers;
	
	public function __construct(){
		parent::__construct();
		  $this->mAuth = ModelAuth::instance();
		  $this->mUsers = Users::instance();
		  $this->mSessions = Sessions::instance();
	}
	public function action_login(){
		if(count($_POST) > 0){	
			$user = $this->mUsers->getByLogin($_POST['login']);
			
			if(is_array($user) && $user['password'] == $this->mAuth->hash($_POST['password'])){
				$token = $this->mAuth->addToken(isset($_POST['remember']));
				
				$this->mSessions->add([
				'id_user'=>$user['id_user'],
				'token'=>$token]);
				
				header('Location: ' . ROOT);
					exit();
			}
		
			$msg = 'Ошибка входа';
		}
		else{
			$msg = '';
		}
	
		$this->caption = 'Вход на сайт';
		$this->contents = $this->template('v_login', ['msg' => $msg]);
	}

	public function action_logout(){
		$this->mAuth->removeToken();
		header('Location: ' . ROOT . 'auth/login');
		exit();
	}


}