<?php if (isset($errors) && !empty($errors)) : ?>
	<div class="space-y-3 mb-4">
		<?php foreach ($errors as $error) : ?>
			<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
				<?= $error ?>
			</div>
		<?php endforeach; ?>
	</div>
<?php endif; ?>