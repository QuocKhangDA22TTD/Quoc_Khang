<?php

include './connect.php';

$major = $_GET['major'];

$sql = 'SELECT title, postingTime, major FROM article WHERE major = "' . $major .'"';
$result = $conn->query($sql);

if($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $title = $row['title'];
        echo '<div class="soft_of_article" onclick="createArticlePage(';
        echo "'" . $title . "'";
        echo ')">';
        echo    '<h1>';
        echo        $row['title'];
        echo    '</h1>';
        echo    '<span>Ngày đăng tải: ' . $row['postingTime'] . ' </span>';
        echo '</div>';
    }
} else {
    echo '<div class="soft_of_article" style="cursor: unset; color: var(--secondTextColor);background-color: var(--thirdBackGroundColor);">';
    echo    '<h1>KHÔNG CÓ BÀI VIẾT';
    echo    '</h1>';
    echo '</div>';
}