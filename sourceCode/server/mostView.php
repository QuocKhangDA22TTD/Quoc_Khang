<?php

include './connect.php';

// tìm bài có số view cao nhất 
$sql1 = 'SELECT MAX(view) AS mostView FROM article';
$result1 = $conn->query($sql1);
$mostView = $result1->fetch_assoc();

// lấy nội dung của bài viết đó ra
$sql2 = 'SELECT title, view, image, content FROM article WHERE view = "' . $mostView['mostView'] . '"';
$result2 = $conn->query($sql2);
$row = $result2->fetch_assoc();

if($result2->num_rows > 0) {

    echo '<a href="#" onclick="createArticlePage('."'".$row['title']."'".')">ĐỌC TIẾP</a>';

    echo '<h1>NHIỀU LƯỢT XEM NHẤT</h1>';

    echo '<h2>';
    echo    $row['title'];
    echo '</h2>';

    echo '<img src="./assets/images/' . $row['image'] . '" alt="hình ảnh của bài viết">';

    echo '<pre>';
    echo    $row['content'];
    echo '</pre>';

}
else {
    echo '<h1 style="font-size: 40px; text-align: center;">KHÔNG CÓ BÀI VIẾT</h1>';
}
