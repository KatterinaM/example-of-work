<?php
namespace Models;
use Core\Model;

class Sessions extends Model{
	
	protected static $instance;	
	
	public static function instance(){
		if(self::$instance == null){
			self::$instance = new self();
		}

		return self::$instance;
	}
	
	public function __construct(){
		parent::__construct();
		$this->table = 'sessions';
		$this->pk = 'id_session';
	}
	
	public function getByToken($token){
		$res = $this->sql->select("SELECT * FROM $this->table WHERE token=:token", 
								  ['token' => $token]);
		return $res[0] ?? false;
	}
	
	protected function validation($fields){
	
	}
}	
?>