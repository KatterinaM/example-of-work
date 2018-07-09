<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link href="<?=$root?>assets/css/style.css" rel="stylesheet" type="text/css">
	<title><?=$caption?></title>
</head>
<body>
	<div class="menu">
		<div class="wrapper">
			<div class="logo">
				<img src="<?=$root?>assets/img/logo.png" alt="">
			</div>
			<div id="menu">
				<ul>
					<? if($user === null): ?>
                        <li><a href="<?=$root?>auth/login">Войти</a></li>
                    <? else: ?>
                        <li><a href="<?=$root?>auth/logout">Выйти (<?=$user['login']?>)</a></li>
                    <? endif; ?>
					<li><a href="<?=$root?>newsAuthClient/add">Написать статью</a></li>
					<li><a href="<?=$root?>">Главная</a></li>
			</div>
		</div>
	</div>
	<div class="header">
		<div class="wrapper">
			<div>
			<h1><?=$caption?></h1>
			</div>
		</div>
	</div>
	<section>
		<div class="team">
			<div class="wrapper">
			<?=$contents?>
			</div>
		</div>
	</section>
	<div class="footer">
		<div class="wrapper">
			<div class="copy">
				<p>&copy; <?=date('Y')?> <span>You Blog</span></p>
			</div>
		</div>
	</div>
</body>
</html>
	
