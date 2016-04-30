<html>
	<head>
		<link rel="stylesheet" type="text/css" href="Style/bootstrap.min.css"/>
		<link rel="stylesheet" type="text/css" href="Style/Site.css"/>	
	</head>
	<body class="text-center">
		<?php
			include 'connection.php';
			$sql = "CALL GetPersoaneLog()";
			$query = $con->query($sql) or die(print_r($con->errorInfo(), true));
		?>
		<h2>Persoane Log</h2>
		
		<table class="table table-hover" border="1" width="70%" cellpadding="4">
			<thead>
				<th>Nume complet</th>
				<th>Stare</th>
				<th>Timp</th>
			</thead>
			<tbody>
				<?php foreach($query as $row) { ?>
					<tr>
						<td><?php echo $row["nume complet"]; ?> </td>
						<td><?php echo $row["stare"]; ?> </td>
						<td><?php echo $row["timp"]; ?> </td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
		<a href="<?php echo "index.php" ?>">Back</a>	
				
	</body>
</html>
