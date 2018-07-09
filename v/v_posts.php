
	<? foreach($news as $new):?>
	<div class="experts">
		<h2><?=$new['title']?></h2>
		<img src="<?=$root?>assets/img/birds.jpg" >
		<p><span><?=$new['dt_public']?></span></p>
		<div class="follow">
			<a href="<?=$root?>newsClient/one/<?=$new['id_new']?>">Перейти</a>
		</div>
		<div class="follow">	
			<? //if ($auth == true):?>	
			<a href="<?=$root?>newsAuthClient/edit/<?=$new['id_new']?>">Редактировать</a>
		</div>
		<div class="follow">	
			<a href="<?=$root?>newsAuthClient/delete/<?=$new['id_new']?>">Удалить</a>
			<? //endif ?>
		</div>
	</div>
	<? endforeach ?>

