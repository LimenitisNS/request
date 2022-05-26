

<?php $__env->startSection("content"); ?>
	<div class="head">Ваши заявки</div>
	<p class="small">Все | Новые | Решённые | Отклонённые</p>
	<!-- Вывод данных запросов -->
	<div class="row">
		<?php if(count($app)): ?>
			<?php $__currentLoopData = $app; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<div class="col">
					<h3><?php echo e($val->title); ?></h3>
					<p class="center">Статус заявки: <b><?php echo e($val->status); ?></b></p>
					<p>Категория заявки: <b><?php echo e($val->category); ?></b></p>
					<p class="center"><b>Описание:</b></p>
					<p><?php echo e($val->description); ?></p>
					<?php if($val->status == "Новая"): ?>
						<p class="small"><a onclick="return window.confirm('Вы действительно хотите удалить заявку?')" href="/profile/app/<?php echo e($val->application_id); ?>/delete">Удалить заявку</a></p>
					<?php elseif($val->status == "Отклонена"): ?>
						<p class="center"><b>Причина отклонения:</b></p>
						<p><?php echo e($val->rejection_reason); ?></p>
					<?php endif; ?>
					<p class="small"><?php echo e($val->created_at); ?></p>
				</div>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		<?php else: ?>
			<h3>Данные отсутствуют</h3>
		<?php endif; ?>
	</div>

	<div class="head">Добавить заявку</div>
	<form action="/profile/app-add" enctype="multipart/form-data" method="POST">
		<?php echo csrf_field(); ?>
		<input type="text" name="title" placeholder="Название (до 64 символов)" required pattern=".{1,64}">
		<textarea name="description" placeholder="Описание (до 256 символов)" required pattern=".{1,256}"></textarea>
		<select required name="category">
			<option value selected disabled>Категория заявки</option>
			<?php if(count($categories)): ?>
				<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<option value="<?php echo e($val->category); ?>"><?php echo e($val->category); ?></option>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			<?php endif; ?>
		</select>
		<p class="left">Фотография заявки</p>
		<input type="file" required name="image">
		<button>Создать заявку</button>
	</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("layout", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\laravel-demo\resources\views/profile.blade.php ENDPATH**/ ?>