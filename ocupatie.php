<html>
	<head>
		<link rel="stylesheet" type="text/css" href="Style/bootstrap.min.css"/>
		<link rel="stylesheet" type="text/css" href="Style/Site.css"/>
	</head>
	<body class="text-center">
		<?php
			include 'connection.php';
			$sql = "select * from Ocupatie WHERE persoana_id='{$_GET['id']}'";
			$query = $con->query($sql) or die(print_r($con->errorInfo(), true));
						
			$sql1 = "CALL GetFullNameForPerson('{$_GET['id']}', @nume_complet); ";
			$query1 = $con->query($sql1);
			$query2 = $con->query("Select @nume_complet as 'nume_complet'");
			$nume_complet_rand = $query2->fetch();
			
		?>
		<h2><?php echo $nume_complet_rand["nume_complet"]; ?></h2>
		
		<?php $num_rows = $query->rowCount(); if($num_rows == "0")  {echo 'Nu exista ocupatii';}  ?>
		<table class="table table-hover" border="1" width="70%" cellpadding="4">
			<thead>
				<th>Nume</th>
				<th>Salariu</th>
				<th>Ore pe zi</th>
				<th>Data angjarii</th>
				<th>Editare</th>
				<th>Stergere</th>
			</thead>
			<tbody>
				<?php foreach($query as $row) { ?>
					<tr>
						<td><?php echo $row["nume"]; ?> </td>
						<td><?php echo $row["salariu"]; ?> </td>
						<td><?php echo $row["ore_pe_zi"]; ?> </td>
						<td><?php echo $row["data_angajarii"]; ?></td>
						<td><?php echo "<a href=\"edit_ocupatie.php?id=" . $row['id'] . "\">Editeaza</a>"; ?></td>
						<td>
							<form method = "post" action="delete_ocupatie.php">
								<input type="hidden" name="id" value="<?php echo $row["id"]; ?>"/>
								<button type="submit" name="submit" value="Sterge">Sterge</button>
							</form>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
		
		<table border="0" width="50%" cellpadding="4">
			<td><h1><a href="index.php">Back</a></td>
		</table>
		
		
		
		
	</body>
</html>
