<?php
namespace Core;

class Template{
	protected static $instance;
	public $globalVars;
	
	public static function instance(){
		if(self::$instance == null){
			self::$instance = new self();
		}

		return self::$instance;
	}
	
	protected function __construct(){
		$this->globalVars = [];
	}

	public function addGlobal($name, $value){
		$this->globalVars[$name] = $value;
	}
	
	public function render($fnameSystem, $params = []){
	extract($this->globalVars);
	extract($params);
	ob_start();
	include("v/{$fnameSystem}.php");
	return ob_get_clean();
	}
}
