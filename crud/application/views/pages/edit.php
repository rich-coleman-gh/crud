<html>
<head>
	<title></title>
</head>
<body>
	<div class="form-group">
		<?php echo form_open('site/update'); 
			foreach ($record as $value) { ?> 
		<input type="hidden" name="id" title="id" value = "<?php echo $value->id; ?>" >
		<div class="col-xs-3">
			<p>
				<label for="username"> Username </label>
				<input type="text" class="form-control" name="username" id="username" value= "<?php echo $value->username; ?>">
			</p>
			<p>
				<label for="password">Password</label>
				<input type="text" class="form-control" name="password" id="password" value= "<?php echo $value->password; ?>">
			</p>
			<p>
				<label for="email">Email</label>
				<input type="text" class="form-control" name="email" id="email" value= "<?php echo $value->email; ?>">
			</p>
			<button id="submitbtn" class="btn btn-primary">Submit</button>
		</div>
		<?php } echo form_close(); ?>
	</div>
</body>
</html>