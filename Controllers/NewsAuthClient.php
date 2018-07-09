<?php

namespace Controllers;

use Models\News as Model;
use Models\Template;
use Models\Auth;

class NewsAuthClient extends NewsClient{
	
	public function __construct(){
		parent::__construct();
		$this->redirectIfNotAuth();
	}

	public function action_add(){
		if(count($_POST) > 0){
			$fields = [];
			$fields['title'] = trim($_POST['title']);
			$fields['content'] = trim($_POST['content']);
			
			$id = $this->mNews->add($fields);	

			if($id === false){
				$errors = $this->mNews->errors();
			}
			else{
				header('Location: ' . ROOT . 'newsClient/one/' . $id); 
				exit();
			}
		}
		else{
			$fields = ['title'=>'', 'content'=>''];
			$errors = [];
		}

		$this->caption = 'Добавить статью';

		$this->contents = $this->template('v_add', [
			'fields' => $fields,
			'errors' => $errors
		]);	
	}
	
	public function action_edit(){
		$id = (int)$this->params[2] ?? '';

		$new = $this->mNews->one($id);
		$fields = [];
		$fields['title'] = ($new['title']);
		$fields['content']  = ($new['content']);
		$errors = [];
		
		if($new === false){
			$this->caption = 'Страница не найдена';
			$this->contents = $this->template('v_404');
			return;
		}
		
		if(count($_POST) > 0){
			$fields['title'] = trim($_POST['title']);
			$fields['content']  = trim($_POST['content']);
			
			
			$new =$this->mNews->edit($id, $fields);

			if($new === false){
				$errors = $this->mNews->errors();
			}
			else{
				header('Location: ' . ROOT . '');  ///one/' . $id_new);
				exit();
			}
		}
		
		$this->caption = 'Редактировать статью';
		$this->contents = $this->template('v_edit', [
			'fields' => $fields,
			'errors' => $errors
		]);	
	}
	
	public function action_delete(){
		$id =(int)$this->params[2] ?? '';

		if($id == 0){
			exit();
		}
		
		if($this->mNews->delete($id)){
			header('Location: ' . ROOT . 'newsClient/');
			exit();
		}
		else {
		$this->caption = 'Ошибка';
			$this->contents = $this->template('v_404');
		}
	}

}