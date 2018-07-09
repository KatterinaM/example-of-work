<?php

namespace Controllers;

use Models\News;
use Core\Template;

class NewsClient extends Client{

	protected $mNews;
	
	public function __construct(){
		parent::__construct();
		$this->mNews = News::instance();
		//$this->mNews = new News();
	}

	public function action_index(){
		$news = $this->mNews->all();
	
		$this->caption = 'Все статьи';

		$this->contents = $this->template('v_posts', [
			'news' => $news
		]);
			
	}

	public function action_one(){
		$id = $this->params[2] ?? '';
		
		$new = $this->mNews->one($id);

		if($new === false){
			$this->page404();
			return;
		}
		else{
			$this->caption = 'Просмотр';
			$this->contents = $this->template('v_post', [
				'new' => $new
			]);
		}
	}
}