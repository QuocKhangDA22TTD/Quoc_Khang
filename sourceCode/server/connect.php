<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "article";

$conn = new mysqli($servername, $username, $password, $dbname);

if(!$conn) {
    die("connection failed: " . $conn->connect_error);
}
