

<?php $__env->startSection("content"); ?>
	<div class="head">Категории</div>
	<form action="/admin/category/add" method="POST">
		<?php echo csrf_field(); ?>
		<div class="line">
			<input type="text" name="category" placeholder="Категория (до 64 символов)" required pattern=".{1,64}">
			<button>Добавить</button>
		</div>
	</form>
	<form action="admin/category/delete" method="POST">
		<?php echo csrf_field(); ?>
		<div class="line">
			<select required name="category_id">
				<option value selected disabled>Категории</option>
				<?php if(count($categories)): ?>
					<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<option value="<?php echo e($val->category_id); ?>"><?php echo e($val->category); ?></option>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				<?php endif; ?>
			</select>
			<button>Удалить</button>
		</div>
	</form>


	<div class="head">Новые заявки</div>
	<div class="row">
		<?php if(count($new)): ?>
			<?php $__currentLoopData = $new; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<div class="col">
					<img src="<?php echo e(asset('assets/'.$val->path_image_before)); ?>">
					<h3><?php echo e($val->title); ?></h3>
					<p class="center">Статус заявки: <b><?php echo e($val->status); ?></b></p>
					<p>Категория заявки: <b><?php echo e($val->category); ?></b></p>
					<p class="center"><b>Описание:</b></p>
					<p><?php echo e($val->description); ?></p>
					<h3>Одобрение заявки</h3>
					<form action="/admin/app/approve" enctype="multipart/form-data" method="POST">
						<?php echo csrf_field(); ?>
						<input type="file" required name="image">
						<button value="<?php echo e($val->application_id); ?>" name="app_id">Одобрить</button>
					</form>
					<h3>Отклонение заявки</h3>
					<form action="/admin/app/reject" method="POST">
						<?php echo csrf_field(); ?>
						<textarea name="rejection_reason" placeholder="Причина отклонения (до 256 символов)" required pattern=".{1,256}"></textarea>
						<button value="<?php echo e($val->application_id); ?>" name="app_id">Отклонить</button>
					</form>
					<p class="small"><?php echo e($val->created_at); ?></p>
				</div>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		<?php else: ?>
			<h3>Данные отсутствуют</h3>
		<?php endif; ?>
	</div>



	<div class="head">Одобренные заявки</div>
	<div class="row">
		<?php if(count($approved)): ?>
			<?php $__currentLoopData = $approved; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<div class="col">
					<img src="<?php echo e(asset('assets/'.$val->path_image_after)); ?>">
					<h3><?php echo e($val->title); ?></h3>
					<p class="center">Статус заявки: <b><?php echo e($val->status); ?></b></p>
					<p>Категория заявки: <b><?php echo e($val->category); ?></b></p>
					<p class="center"><b>Описание:</b></p>
					<p><?php echo e($val->description); ?></p>
					<p class="small"><?php echo e($val->created_at); ?></p>
				</div>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		<?php else: ?>
			<h3>Данные отсутствуют</h3>
		<?php endif; ?>
	</div>



	<div class="head">Отклоненные заявки</div>
	<div class="row">
		<?php if(count($rejected)): ?>
			<?php $__currentLoopData = $rejected; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<div class="col">
					<img src="<?php echo e(asset('assets/'.$val->path_image_before)); ?>">
					<h3><?php echo e($val->title); ?></h3>
					<p class="center">Статус заявки: <b><?php echo e($val->status); ?></b></p>
					<p>Категория заявки: <b><?php echo e($val->category); ?></b></p>
					<p class="center"><b>Описание:</b></p>
					<p><?php echo e($val->description); ?></p>
					<p class="center"><b>Причина отклонения:</b></p>
					<p><?php echo e($val->rejection_reason); ?></p>
					<p class="small"><?php echo e($val->created_at); ?></p>
				</div>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

		<?php else: ?>
			<h3>Данные отсутствуют</h3>
		<?php endif; ?>
	</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make("layout", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\laravel-demo\resources\views/admin.blade.php ENDPATH**/ ?>