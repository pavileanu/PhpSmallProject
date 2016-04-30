<html>
	<head>
		<link rel="stylesheet" type="text/css" href="Style/bootstrap.min.css"/>
		<link rel="stylesheet" type="text/css" href="Style/Site.css"/>	
	</head>
	<body class="text-center">
		<?php
			include 'connection.php';
			$sql = "CALL GetPersoane()";
			$query = $con->query($sql) or die(print_r($con->errorInfo(), true));
		?>
		<h2>Persoana</h2>
		
		<table class="table table-hover" border="1" width="70%" cellpadding="4">
			<thead>
				<th>Nume</th>
				<th>Prenume</th>
				<th>Oras</th>
				<th>Editare</th>
				<th>Stergere</th>
				<th>Ocupatii</th>
			</thead>
			<tbody>
				<?php foreach($query as $row) { ?>
					<tr>
						<td><?php echo $row["nume"]; ?> </td>
						<td><?php echo $row["prenume"]; ?> </td>
						<td><?php echo $row["oras"]; ?> </td>
						<td><?php echo "<a href=\"edit.php?id=" . $row['id'] . "\">Editeaza</a>"; ?></td>
					    <td>
							<form method = "post" action="delete.php">
								<input type="hidden" name="id" value="<?php echo $row["id"]; ?>"/>
								<button type="submit" name="submit" value="Sterge">Sterge</button>
							</form>
						</td>
						<td><?php echo "<a href=\"ocupatie.php?id=" . $row['id'] . "\">Arata Ocupatile</a>"; ?></td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
		
		
		<table border="0" width="100%" cellpadding="4">
			
			<td><h1><?php echo "<a href=\"insert.php?id=" . $row['id'] . "\">Adauga Persoana</a>"; ?></h1></td>
			<td><h1><?php echo "<a href=\"insert_ocupatie.php"  . "\">Adaugare ocupatie</a>"; ?></h1></td>
			<td><h1><a href="raport.php">Raport</a></h1></td>
			<td><h1><a href="persoane_log.php">Persoane Log</a></h1></td>
			<td><h1><a href="ocupatie_log.php">Ocupatie Log</a></h1></td>

		</table>
		
		
		
	</body>
</html>
