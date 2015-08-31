<html>
<head>
	<title></title>
	<style type="text/css">
		label{display: block;}
	</style>
</head>
	<table class="table table-striped">
        <thead>
            <tr>
                <!-- <th> <input type="checkbox" value=""/> </th> -->
                <th> Id </th>
                <th> Username </th>
                <th> Password </th>
                <th> Email </th>
            </tr>
        </thead>
        <tbody>
			<?php foreach ($record as $value) { ?>
			<tr>
				<td> <?php echo $value->id; ?> </td>
				<td> <?php echo $value->username; ?> </td>
				<td><?php echo $value->password; ?></td>
				<td><?php echo $value->email; ?></td>
				<td> <?php echo anchor('site/delete/' .$value->id, 'Delete') ?></td>
				<td> <?php echo anchor('site/edit/' .$value->id, 'Edit') ?></td>
			</tr>
			<?php } ?>
		</tbody>
	</table	>
   	<ul class="pagination">
		<p><?php echo $links; ?></p>
	</ul>	
</body>
</html>
