<?php

namespace Controllers;

use Models\News as Model;
use Models\Template;

class NewsAdmin extends Client{

	public function action_index(){
		$mNews = new Model();
		$news = $mNews->all();

		$this->caption = 'Все статьи';

		$this->contents = Template::render('v_posts', [
			'news' => $news
			//'auth' => $auth
		]);
	}

	public function action_one(){
		$id_new = $this->params[2] ?? '';

		$mNews = new Model();
		$new = $mNews->one($id_new);

		if($new === false){
			$this->caption = 'Страница не найдена';
			$this->contents = Template::render('v_404');
		}
		else{
			$this->caption = 'Просмотр';
			$this->contents = Template::render('v_post', [
				'new' => $new
				//'auth' => $auth
			]);
		}
	}

	public function action_add(){
		if(count($_POST) > 0){
			$title = trim($_POST['title']);
			$content = trim($_POST['content']);

			$mNews = new Model();
			$id_new = $mNews->add($title, $content);

			if($id_new === false){
				$msg = $mNews->lastError();
			}
			else{
				header('Location: ' . ROOT . 'post/' . $id_new);
				exit();
			}
		}
		else{
			$title = '';
			$content = '';
			$msg = '';
		}

		$this->caption = 'Добавить статью';

		$this->contents = Template::render('v_add', [
			'title' => $title,
			'content' => $content,
			'msg' => $msg
		]);	
	}
	
	public function action_edit(){
		$id_new = $this->params[2] ?? '';

		$mNews = new Model();
		$new = $mNews->one($id_new);

		$this->caption = 'Редактировать статью';
		
		if($new === false){
			$this->caption = 'Страница не найдена';
			$this->contents = Template::render('v_404');
		}
		
		$this->contents = Template::render('v_edit', [
			'title' => $title,
			'content' => $content,
			'msg' => $msg
		]);	
	
		if(count($_POST) > 0){
			$title = trim($_POST['title']);
			$content = trim($_POST['content']);

			$mNews = new Model();
			$id_new = $mNews->change($title, $content, $id_new);

			if($id_new === false){
				$msg = $mNews->lastError();
			}
			else{
				header('Location: ' . ROOT . 'post/' . $id_new);
				exit();
			}
		}
		
		$this->contents = Template::render('v_edit', [
			'title' => $title,
			'content' => $content,
			'msg' => $msg
		]);	
	}
	
	public function action_delete(){
		$id_new = $this->params[2] ?? '';

		$mNews = new Model();
		$new = $mNews->newsDelete($id_new);

		if($new === false){
			$this->caption = 'Ошибка';
			$this->contents = Template::render('v_404');
		}
		else{
			header('Location: ' . ROOT . 'posts');
			exit();
		}
	}

}