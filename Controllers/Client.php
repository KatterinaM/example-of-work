<?php

namespace Controllers;

use Core\ModelAuth;
use Models\Users;

class Client extends Base{
	protected $caption;
	protected $contents;
	protected $user;

	public function __construct(){
		parent::__construct();

		$this->caption = '';
		$this->contents = '';		
		$this->templateBuilder->addGlobal('root', ROOT);
		
		$this->mUsers = Users::instance();
		$this->user = $this->mUsers->getByAuth();
	}

	public function render(){
		return $this->template('v_main', [
			'caption' => $this->caption,
			'contents' => $this->contents,
			'user' => $this->user
		]);
	}
	
	public function page404(){
		$this->caption = 'Страница не найдена';
		$this->contents = $this->template('v_404');
	}
	
	public function redirectIfNotAuth(){
		if($this->user == null){
			header('Location: ' . ROOT . 'auth/login');
			exit();
		}
	}
}