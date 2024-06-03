<?php
    session_start();

    if($_SESSION['userName'] != 'admin') {
        die('bạn không phải admin');
    }
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin page</title>
    <link rel="stylesheet" href="../../assets/css/base.css">
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th {
            font-size: 1.7rem;
            border: 1px solid #333;
            text-align: center;
            padding: 0.5rem;
            background-color: #111;
            color: #ddd;
        }

        td {
            font-size: 1.5rem;
            border: 1px solid #333;
            text-align: center;
            height: 5rem;
            max-width: 21rem;
            overflow: auto;

        }

        h1 {
            font-size: 3rem;
            text-align: center;
            background-color: #aaa;
            padding: 2rem;
        }
    </style>
</head>
<body>
<h1>QUẢN LÝ THÔNG TIN CHI TIẾT BÀI VIẾT</h1>
<table id="info">
    <tr>
        <th>ID</th>
        <th>TIÊU ĐỀ</th>
        <th>NỘI DUNG</th>
        <th>LINK HÌNH ẢNH</th>
        <th>TÁC GIẢ</th>
        <th>THỜI GIAN ĐĂNG</th>
        <th>CHUYÊN NGÀNH</th>
        <th>LƯỢT VIEW</th>
        <th>LƯỢT TÌM KIẾM</th>
        <th></th>
        <th></th>
    </tr>
<?php

include '../connect.php';

$sql = "SELECT * FROM article";
$result = $conn->query($sql);

if($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $id = $row['id'];
        $title = $row['title'];
        $content = $row['content'];
        $image = $row['image'];
        $author = $row['author'];
        $postingTime = $row['postingTime'];
        $major = $row['major'];
        $view = $row['view'];
        $search = $row['search'];
        
        echo '<tr>';

        include './openTd.php';
            echo $id;
        include './closeTd.php';

        include './openTd.php';
            echo $title;
        include './closeTd.php';

        include './openTd.php';
            echo '<form action="./showContent.php" method="post">';
            echo '<input type="submit" value="xem nội dung" name="'.$id.'">';
            echo '</form>';
        include './closeTd.php';

        include './openTd.php';
            echo '<a href="./displayImage.php?image=' . $image . '">';
            echo 'xem hình ảnh';
            echo '</a>';
        include './closeTd.php';

        include './openTd.php';
            echo $author;
        include './closeTd.php';

        include './openTd.php';
            echo $postingTime;
        include './closeTd.php';

        include './openTd.php';
            echo $major;
        include './closeTd.php';

        include './openTd.php';
            echo $view;
        include './closeTd.php';

        include './openTd.php';
            echo $search;
        include './closeTd.php';

        include './openTd.php';
        echo '<form action="./edit.php" method="post">';
        echo '<input type="submit" value="sửa bài" name="'.$id.'">';
        echo '</form>';
        include './closeTd.php';

        include './openTd.php';
            echo '<form action="./remove.php" method="post">';
            echo '<input type="submit" value="xóa bài" name="'.$id.'">';
            echo '</form>';
        include './closeTd.php';

        echo '</tr>';
    }
} else {
    echo '<h1>KHÔNG CÓ DỮ LIỆU NÀO ĐƯỢC LƯU TRỮ</h1>';
}
?>
</table>
<pre id="show"></pre>
<?php include_once './userInfo.php'; ?>
<?php include_once './commentInfo.php'; ?>
<script>
    function showContent(title) {
        const show = new XMLHttpRequest();
        show.onload = function() {
            document.getElementById('info').style.display = "none";
            document.getElementById('show').innerHTML = this.responseText;
        }
        show.open("GET", "./showContent.php?title=" + title);
        show.send();
    }
</script>
</body>
</html>
