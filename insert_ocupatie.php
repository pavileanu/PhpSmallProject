<?php
    include 'connection.php';
  
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
				
		$sql = "Insert  Ocupatie(persoana_id, nume, salariu, ore_pe_zi, data_angajarii) Values('{$_POST['persoane']}', '{$_POST['nume']}', '{$_POST['salariu']}','{$_POST['ore_pe_zi']}', '{$_POST['data_angajarii']}') ";
		$con->query($sql) or die(print_r($con->errorInfo(), true));
		echo 'Interogare: <i>'.$sql.'</i><br><br>';
		header('Location: '.'index.php');
	}
	
	$sqlPersoane = "Call GetPersoane()";
	$records_persoane = $con->query($sqlPersoane) or die(print_r($con->errorInfo(), true));
?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="Style/bootstrap.min.css"/>
		<link rel="stylesheet" type="text/css" href="Style/Site.css"/>	
	</head>
	<body class="text-center">
		<h1>Creati ocupatie</h1>
		<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
			Nume: <br><input type="text" name="nume"  /> <br/>
			Salariu: <br><input type="text" name="salariu" /><br/>
			Ore pe zi: <br><input type="text" name="ore_pe_zi" /> <br/>
			Data angajarii: <br><input type="date" name="data_angajarii"/> <br/>
			Persoana: <br>
			<select name="persoane">
				<?php foreach ($records_persoane as $persoana){ ?>
				<option value="<?php echo $persoana["id"] ?>"><?php echo $persoana["nume"] ?></option>
				<?php } ?>
			</select>
			<br>
			<br>
			<br>
			<input type="hidden" name="id" value="<?php echo $record["id"]; ?>"/>
			<button type="submit" name="submit" value="Creaza"><font size="+1" color="black">Creeaza</button>
		</form>
		<a href="<?php echo "index.php" ?>">Back</a>						
			
	</body>
</html>
		
		