<?php
namespace Models;
use Core\Model;

class News extends Model{
	
	protected static $instance;	
	
	public static function instance(){
		if(self::$instance == null){
			self::$instance = new self();
		}

		return self::$instance;
	}
	
	public function __construct(){
		parent::__construct();
		$this->table = 'news';
		$this->pk = 'id_new';
	}
	
	protected function validation($fields){
	if($fields['title'] == '' || $fields['content'] == ''){
			$this->addError('Заполните все поля');
		}
		else{
			if(mb_strlen($fields['title'], 'UTF8') > 200) {
			$this->addError('Заголовок не больше 200 символов');
			}
			
			if(mb_strlen($fields['content'], 'UTF8') > 2000){
				$this->addError('Cообщение не больше 2000 символов');
			}
		}
	}
}	
?>