<?php
namespace Models;
use Core\Model;
use Core\ModelAuth;

class Users extends Model{
	
	protected static $instance;	
	protected $mAuth;
	protected $mSessions;
	
	public static function instance(){
		if(self::$instance == null){
			self::$instance = new self();
		}

		return self::$instance;
	}
	
	public function __construct(){
		parent::__construct();
		$this->table = 'users';
		$this->pk = 'id_user';
		$this->mAuth = ModelAuth::instance();
		$this->mSessions = Sessions::instance();
		
	}
	
	public function getByLogin($login){
		$res = $this->sql->select("SELECT * FROM $this->table WHERE login=:login", 
								  ['login' => $login]);
		return $res[0] ?? false;
	}
	
	public function getByAuth(){
		$token = $this->mAuth->getToken();

		if(!$token){
			return false;
		}
		
		$session = $this->mSessions->getByToken($token);

		if(!$session){
			$this->mAuth->removeToken();
			return false;
		}

		return  $this->one($session['id_user']);
	}

	
	protected function validation($fields){
	/*if($fields['title'] == '' || $fields['content'] == ''){
			$this->addError('Заполните все поля');
		}
		else{
			if(mb_strlen($fields['title'], 'UTF8') > 200) {
			$this->addError('Заголовок не больше 200 символов');
			}
			
			if(mb_strlen($fields['content'], 'UTF8') > 2000){
				$this->addError('Cообщение не больше 2000 символов');
			}
		}*/
	}
}	
?>