<?php
	if(Auth::check())
		$role = Auth::user()->role;
	else $role = "guest";
?>

<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Demoexam2022</title>
	<link rel="stylesheet" href="<?php echo e(asset('assets/style.css')); ?>">
</head>
<body>

	<header>
		<div class="top">
			<h1>Заголовок</h1>
			<h2>Дополнительный текст</h2>
		</div>
		<div class="content">
			<nav>
				<?php if($role == "admin"): ?>
					<p><a href="/"><img src="<?php echo e(asset('assets/logo/logo.png')); ?>" alt=""></a></p>
					<p><a href="/profile">Личный кабинет</a></p>
					<p><a href="/admin">Заявки</a></p>
					<p><a href="/logout">Выход</a></p>
				<?php elseif($role == "user"): ?>
					<p><a href="/profile">Личный кабинет</a></p>
					<p><a href="/"><img src="<?php echo e(asset('assets/logo/logo.png')); ?>" alt=""></a></p>
					<p><a href="/logout">Выход</a></p>
				<?php else: ?>
					<p><a href="/#register">Регистрация</a></p>
					<p><a href="/"><img src="<?php echo e(asset('assets/logo/logo.png')); ?>" alt=""></a></p>
					<p><a href="/#login">Войти</a></p>
				<?php endif; ?>
			</nav>
		</div>
	</header>

	<div class="message"><?php echo e($errors->message->first()); ?></div>

	<main>
		<div class="content">
			
			<?php echo $__env->yieldContent("content"); ?>

		</div>
	</main>

</body>
</html><?php /**PATH C:\OpenServer\domains\laravel-demo\resources\views/layout.blade.php ENDPATH**/ ?>