<html>
<head>
	<title></title>
</head>
<body>
	<div>
		<?php echo form_open('site/update'); 
			foreach ($record as $value) { ?> 
		<input type="hidden" name="id" title="id" value = "<?php echo $value->id; ?>" >
		<p>
			<label for="username"> Username </label>
			<input type="text" name="username" id="username" value= "<?php echo $value->username; ?>">
		</p>
		<p>
			<label for="password">Password</label>
			<input type="text" name="password" id="password" value= "<?php echo $value->password; ?>">
		</p>
		<p>
			<label for="email">Email</label>
			<input type="text" name="email" id="email" value= "<?php echo $value->email; ?>">
		</p>
		<button id="submitbtn">Submit</button>
		<?php } echo form_close(); ?>
	</div>
</body>
</html>