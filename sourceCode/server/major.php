<?php

include './connect.php';

// function createRandNum() {
//     return rand(1, 4);
// }

// $random = createRandNum();
// if ($random == 1) {
//     $major = 'lịch sử';
// }

// if($random == 2) {
//     $major = 'địa lý';
// }

// if($random == 3) {
//     $major = 'văn hóa';
// }

// if($random == 4) {
//     $major = 'quân sự';
// }

// // lấy nội dung của bài viết đó ra
// $sql = 'SELECT title, content, image, major FROM article WHERE major = "' . $major . '"';
// $result = $conn->query($sql);
// $row = $result->fetch_assoc();

// if($result->num_rows > 0) {

//     echo '<h1>' . $major . '</h1>';

//     echo '<h2>';
//     echo    $row['title'];
//     echo '</h2>';

//     echo '<img src="./assets/images/' . $row['image'] . '" alt="hình ảnh của bài viết">';

//     echo '<a href="#" onclick="createArticlePage('."'".$row['title']."'".')">ĐỌC TIẾP</a>';
//     echo '<pre>';
//     echo    $row['content'];
//     echo '</pre>';
// }
// else {
//     echo '<h1 style="font-size: 40px; text-align: center;">KHÔNG CÓ BÀI VIẾT</h1>';
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
            
            echo '<a href="#" onclick="createArticlePage('."'".$row['title']."'".')">ĐỌC TIẾP</a>';

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

            // include_once './comment.php';
        }

        $articleNum++;
    }
} else {
    include './mostView.php';
}

// include_once './randomArticle.php';