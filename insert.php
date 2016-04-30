<?php
    include 'connection.php';
  
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
				
		$sql = "Call InsertPersoana('{$_POST['nume']}', '{$_POST['prenume']}', '{$_POST['oras']}')";
		$query = $con->query($sql) or die(print_r($con->errorInfo(), true));
		echo 'Interogare: <i>'.$sql.'</i><br><br>';
		header('Location: '.'index.php');
	}
	
?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="Style/bootstrap.min.css"/>
		<link rel="stylesheet" type="text/css" href="Style/Site.css"/>	
	</head>
	<body class="text-center">
		<h1>Creati persoana</h1>
		<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
			Nume: <br><input type="text" name="nume"  /> <br/>
			Prenume: <br><input type="text" name="prenume" /><br/>
			Oras: <br><input type="text" name="oras" /> <br/>
			<br>
			<br>
			<br>
			<button type="submit" name="submit" value="Creaza"><font size="+1" color="black">Creeaza</button>
		</form>
		<a href="<?php echo "index.php" ?>">Back</a>						
			
	</body>
</html>
		
		