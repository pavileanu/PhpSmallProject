<html>
	<head>
		<link rel="stylesheet" type="text/css" href="Style/bootstrap.min.css"/>
		<link rel="stylesheet" type="text/css" href="Style/Site.css"/>	
	</head>
	<body class="text-center">
		<?php
			include 'connection.php';
			$sql = "CALL GetReport()";
			$query = $con->query($sql) or die(print_r($con->errorInfo(), true));
		?>
		<h2>Raport</h2>
		
		<table class="table table-hover" border="1" width="70%" cellpadding="4">
			<thead>
				<th>Nume Complet</th>
				<th>Numar Ocupatii</th>
				<th>Salariu maxim</th>
			</thead>
			<tbody>
				<?php foreach($query as $row) { ?>
					<tr>
						<td><?php echo $row["nume complet"]; ?> </td>
						<td><?php echo $row["numar ocupatii"]; ?> </td>
						<td><?php echo $row["salariu maxim"]; ?> </td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
		<a href="<?php echo "index.php" ?>">Back</a>	
				
	</body>
</html>
