<?php

session_start();


include './connect.php';

$title = $_GET['title'];
$active = $_GET['active'];

$_SESSION['title'] = $title;

$sql1 = 'SELECT title, content, image, major FROM article WHERE title = "' . $title . '"';
$result1 = $conn->query($sql1);


if($active == 'search') {
    $sql2 = 'SELECT id, title, search FROM article WHERE title = "' . $title . '"';
    $result2 = $conn->query($sql2);
    
    if($result2->num_rows == 0) {
        echo '<h1>KHÔNG TÌM THẤY KẾT QUẢ<h/1>';
        exit();
    }
    
    $searchNum = $result2->fetch_assoc();

    if($searchNum['title'] == "") {
        echo '<h1>KHÔNG TÌM THẤY KẾT QUẢ<h/1>';
        exit();
    }

    $searchUp = $searchNum['search'] + 1;

    $sql3 = "UPDATE article SET search = $searchUp WHERE title = '$title'";
    $result6 = $conn->query($sql3);
}

if($active == 'view') {
    $sql5 = 'SELECT title, view FROM article WHERE title = "' . $title . '"';
    $result5 = $conn->query($sql5);
    $viewNum = $result5->fetch_assoc();
    $viewUp = $viewNum['view'] + 1;

    $sql6 = "UPDATE article SET view = $viewUp WHERE title = '$title'";
    $result6 = $conn->query($sql6);
}

if($result1->num_rows > 0) {

    $row = $result1->fetch_assoc();

    if($row['title'] == null) {
        die('<h1>KHÔNG TÌM THẤY KẾT QUẢ<h/1>');
    }

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

    include './comment.php';
} else {
    echo '<h1>KHÔNG TÌM THẤY KẾT QUẢ<h/1>';
}