<?php

function connect() {
    require 'config.php';
    $conn = new mysqli($mysql['server'], $mysql['username'], $mysql['password'], $mysql['dbname']);
    if ($conn->connect_error)
        return false;
    else return $conn;
}

function matchExists() {
    $conn= connect();
    $sql= "SELECT * FROM Partita";
    $result = $conn->query($sql);
    $conn->close();
    if ($result->num_rows > 0) return true; 
    else return false;
}

function joinMatch($username) {
    $conn= connect();
    $sql= "INSERT INTO Partita VALUES ('".$username."',5,".time().")";
    $ris = $conn->query($sql);
    $conn->close();
    if ($ris === TRUE)
        return true;
    else return false;
    
}

function createMatch() {
    $conn= connect();
    $sql= "CREATE TABLE Partita (
        username varchar(255) PRIMARY KEY,
        dices int NOT NULL,
        startTime BIGINT
    );";
    $ris= $conn->query($sql);
    $conn->close();
    if ($ris === TRUE) return true;
    else return false;
}

function getPlayers() {
    $conn= connect();
    $sql= "SELECT username FROM Partita ORDER BY startTime ASC";
    $result = $conn->query($sql);
    $conn->close();
    return $result;
}

function deleteMatch() {
    $conn= connect();
    $sql= "DROP TABLE Partita";
    $result = $conn->query($sql);
    $conn->close();
}
?>