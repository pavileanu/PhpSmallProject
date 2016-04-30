<?php
    include 'connection.php';
  
	$ocupatieID = 0;
  
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
				
		$sql = "UPDATE  Ocupatie SET nume='{$_POST['nume']}',salariu='{$_POST['salariu']}',ore_pe_zi='{$_POST['ore_pe_zi']}' ,data_angajarii='{$_POST['data_angajarii']}', persoana_id = {$_POST['persoane']}  WHERE id='{$_POST['id']}' ";
		$con->query($sql) or die(print_r($con->errorInfo(), true));
		echo 'Interogare: <i>'.$sql.'</i><br><br>';
		$ocupatieID = $_POST['id'];
	}
	else{
		$ocupatieID = $_GET['id'];
	}
	
	$sql = "SELECT * FROM Ocupatie Where id = '$ocupatieID'";
    $query = $con->query($sql) or die(print_r($con->errorInfo(), true));
	$record = $query->fetch();
	
	$sqlPersoane = "Call GetPersoane()";
	$records_persoane =  $con->query($sqlPersoane) or die(print_r($con->errorInfo(), true));

?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="Style/bootstrap.min.css"/>
		<link rel="stylesheet" type="text/css" href="Style/Site.css"/>	
	</head>
	<body class="text-center">
		<h1>Editati <?php echo $record["nume"]; ?></h1>
		<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
			Nume: <br><input type="text" name="nume" value="<?php echo $record["nume"]; ?>" /> <br/>
			Salariu: <br><input type="text" name="salariu" value="<?php echo $record["salariu"]; ?>"/><br/>
			Ore pe zi: <br><input type="text" name="ore_pe_zi" value="<?php echo $record["ore_pe_zi"]; ?>"/> <br/>
			Data angajarii: <br><input type="date" name="data_angajarii" value="<?php echo $record["data_angajarii"]; ?>"/> <br/>
			Persoana: <br>
			<select name="persoane">
				<?php foreach ($records_persoane as $persoana){ ?>
				<option value="<?php echo $persoana["id"] ?>" <?php if ($persoana["id"] == $record["persoana_id"]) echo "selected"; ?> ><?php echo $persoana["nume"] ?></option>
				<?php } ?>
			</select>
			<br>
			<br>
			<br>
			<input type="hidden" name="id" value="<?php echo $record["id"]; ?>"/>
			<button type="submit" name="submit" value="Update"><font size="+1" color="black">Update</button>
		</form>
		<a href="<?php echo "ocupatie.php?id=" . $record["persoana_id"]  ?>">Back</a>						
			
	</body>
</html>
		
		