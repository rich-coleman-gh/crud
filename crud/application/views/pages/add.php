<body>
	<div class="form">
		<?php echo form_open('site/create/'); ?>
		<div class="col-xs-3">
			<p>
				<label for="username"> Username </label>
				<input type="text" class="form-control" name="username" id="username">
			</p>
			<p>
				<label for="password">Password</label>
				<input type="text" class="form-control" name="password" id="password">
			</p>
			<p>
				<label for="email">Email</label>
				<input type="text" class="form-control" name="email" id="email">
			</p>
		<button id="submitbtn" class="btn btn-primary">Submit</button>
		</div>
		<?php echo form_close(); ?>
	</div>