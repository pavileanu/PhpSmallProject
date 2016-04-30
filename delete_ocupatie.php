<?php

    include 'connection.php';

	$sql="Select * FROM Ocupatie WHERE id='{$_POST['id']}'";
    $query = $con->query($sql) or die(print_r($con->errorInfo(), true));
	$persoana_id = $query->fetch()["persoana_id"];
	
    $sql="DELETE FROM Ocupatie WHERE id='{$_POST['id']}'";
    echo 'Interogare: <i>'.$sql.'</i><br><br>';
    $con->query($sql) or die(print_r($con->errorInfo(), true));
	header('Location: '.'ocupatie.php?id='. $persoana_id);
       
?>