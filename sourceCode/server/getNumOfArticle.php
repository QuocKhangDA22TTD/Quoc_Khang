<?php

include './connect.php';

$sql = 'SELECT COUNT(title) AS num FROM article';
$result = $conn->query($sql);
$numberOfArticle = $result->fetch_assoc();

echo $numberOfArticle['num'];