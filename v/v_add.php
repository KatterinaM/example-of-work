<form method="post">
	<div>
		<div class="name">Название</div>
		<input type="text" name="title" value="<?=$fields['title']?>" class="title">
	</div>
	<div>
		<div class="name">Контент</div>
		<textarea name="content" class="content"><?=$fields['content']?></textarea>
	</div>
	<div><button>Отправить</button></div>
</form>
<? foreach($errors as $err): ?>
	<p><?=$err?></p>
<? endforeach; ?>

