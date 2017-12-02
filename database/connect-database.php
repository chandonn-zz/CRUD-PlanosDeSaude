<?php

$host     = 'localhost';
$user     = 'root';
$password = '1234';
$database = 'sistemaSHOSP';

try {
	$database_connection = new PDO( 'mysql:host=localhost;dbname=sistemaSHOSP', $user, $password );
	$database_connection->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
} catch ( PDOException $e ) {

	echo 'Erro: ' . $e->getMessage();
}

include_once '../sistema-de-saude.class.php';

$system = new Sistema_Saude( $database_connection );
