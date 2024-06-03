<?php

include './connect.php';

$sql = 'SELECT COUNT(id) AS mem FROM user';
$result = $conn->query($sql);
$numberOfArticle = $result->fetch_assoc();

echo $numberOfArticle['mem'];