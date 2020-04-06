<?php

function creatDatabaseConnection(){
	$servername = "localhost";
	$username = "root";
	$dbname = "B3W45_eind";

	try {
    	$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username);
    	// set the PDO error mode to exception
    	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    	return $conn;
 	}
	catch(PDOException $e){
    	echo "Connection failed: " . $e->getMessage();
    }
}

function readCharacters(){
	$dbConnection = creatDatabaseConnection();
	$stmt = $dbConnection->prepare("SELECT name,id,avatar,health,attack,defense FROM characters ORDER BY name ASC");
	$stmt->execute();
	$result = $stmt->fetchAll();
	$dbConnection = null;
	return $result;
}

function readCharacter($id){
	$dbConnection = creatDatabaseConnection();
	$stmt = $dbConnection->prepare("SELECT * FROM characters WHERE id=:id");
	$stmt->bindParam(":id", $id);
	$stmt->execute();
	$result = $stmt->fetch();
	$dbConnection = null;
	return $result;
}




?>
