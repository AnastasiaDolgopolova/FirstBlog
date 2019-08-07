<?php
$this->layout('layout',['title' => 'Error']);
?>
		<div class="container text-center my-5 py-5">
			<?php if(is_array($errorMessage)):
				foreach($errorMessage as $mesage) :?>
				<h1 class="text-danger"><?php echo $mesage; ?></h1>
				<?php endforeach;?>
				<?php else: ?>
				<h1 class="text-danger"><?php echo $errorMessage; ?></h1>	
				<?php endif; ?>
			<a href="<?php echo $_SERVER['HTTP_REFERER']; ?>">Назад</a>
		</div>
