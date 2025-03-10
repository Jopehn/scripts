<?php
$dns="mysql:dbname=test;host=127.0.0.1";
$user="root";
$pass='';
try {
	$conn=new PDO($dns, $user, $pass);
} catch (PDOException $e) {
	echo "Falló la conexion: ", $e->getMesage();
}
?>