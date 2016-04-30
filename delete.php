<?php

    include 'connection.php';
	
    $sql="DELETE FROM Persoana WHERE id='{$_POST['id']}'";
    echo 'Interogare: <i>'.$sql.'</i><br><br>';
    $query = $con->query($sql) or die(print_r($con->errorInfo(), true));
	header('Location: '.'index.php');
   
    
?>