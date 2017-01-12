<div class="in-page">
	<div class="login-page forma">
		<h1>Login</h1>
		<?= $this->Form->create() ?>

		<?= $this->Form->input('email', ['class' => 'col-md-12', 'label' => false, 'placeholder' => 'Username']) ?>
		<div class="clearfix"></div>
		<br>
		<?= $this->Form->input('password',['class' => 'col-md-12', 'label' => false, 'placeholder' => 'Password']) ?>
		<div class="clearfix"></div>
		<div class="cBtn-login">
		<?= $this->Form->button('Login', ['class' => 'send']) ?>
		</div>
		<div class="clearfix"></div>
		<?= $this->Form->end() ?>
		New user? Create an account <a href="<?php echo $this->request->webroot;?>workers/new_worker">here</a>.
	</div>
</div>

