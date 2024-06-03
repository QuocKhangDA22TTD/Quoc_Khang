<?php

session_start();

include './connect.php';

// function random($a, $b) {
//     return rand($a, $b);
// }

// $sql1 = "SELECT MAX(id) AS maxId FROM article";
// $result1 = $conn->query($sql1);
// $maxId = $result1->fetch_assoc();

// $sql2 = "SELECT MIN(id) AS minId FROM article";
// $result2 = $conn->query($sql2);
// $minId = $result2->fetch_assoc();

// $sql3 = "SELECT id FROM article";
// $result3 = $conn->query($sql3);
// $id = $result3->fetch_assoc();

// $randomNum = rand($minId['minId'], $maxId['maxId']);

// if($randomNum == 37) {
//     while($randomNum == 37) {
//         $randomNum = rand($minId['minId'], $maxId['maxId']);
//     }
// }

$sql = 'SELECT COUNT(id) FROM article';
$result = $conn->query($sql);

$maxNum = $result->fetch_assoc();


$sql5 = "SELECT id, title, content, image, major FROM article";
$result5 = $conn->query($sql5);


if($result5->num_rows > 0) {

    $articleNum  = 0;

    $randomNum = rand(0, ($maxNum['COUNT(id)'] - 1));

    while($row = $result5->fetch_assoc()) {

        if($articleNum == $randomNum) {

            $_SESSION['title'] = $row['title'];

            echo '<h1>';
            echo    $row['major'];
            echo '</h1>';
        
            echo '<h2>';
            echo    $row['title'];
            echo '</h2>';
        
            echo '<img src="./assets/images/' . $row['image'] . '" alt="hình ảnh của bài viết">';
        
            echo '<pre>';
            echo    $row['content'];
            echo '</pre>';

            include_once './comment.php';
        }

        $articleNum++;
    }
} else {
    include './mostView.php';
}

