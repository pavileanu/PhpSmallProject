<?php
    include 'connection.php';
  
	$persoanaID = 0;
  
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
				
		$sql = "UPDATE  Persoana SET nume='{$_POST['nume']}',prenume='{$_POST['prenume']}',oras='{$_POST['oras']}' WHERE id='{$_POST['id']}' ";
		$con->query($sql) or die(print_r($con->errorInfo(), true));
		echo 'Interogare: <i>'.$sql.'</i><br><br>';
		$persoanaID = $_POST['id'];
	}
	else{
		$persoanaID = $_GET['id'];
	}
	
	$sql = "Call GetPersoana({$persoanaID})";
    $query = $con->query($sql) or die(print_r($con->errorInfo(), true));
	$record = $query->fetch();

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
			Salariu: <br><input type="text" name="prenume" value="<?php echo $record["prenume"]; ?>"/><br/>
			Ore pe zi: <br><input type="text" name="oras" value="<?php echo $record["oras"]; ?>"/> <br/>
			<br>
			<br>
			<br>
			<input type="hidden" name="id" value="<?php echo $record["id"]; ?>"/>
			<button type="submit" name="submit" value="Update"><font size="+1" color="black">Update</button>
		</form>
		<a href="<?php echo "index.php"?>">Back</a>						
			
	</body>
</html>
		
		