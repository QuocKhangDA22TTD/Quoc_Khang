<?php

if($_SERVER['REQUEST_METHOD'] == 'GET') {
    include_once './connect.php';

    $key = $_GET['key'];

    $searchKey = "SELECT title FROM article WHERE title LIKE '$key%'";
    $result = $conn->query($searchKey);

    if($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
?>

<a href="#" onclick="keyOpen('<?php echo $row['title'] ?>')"> <?php echo $row['title'] ?> </a>

<?php
        }
    } else {
        echo '<a>KHÔNG TÌM THẤY KẾT QUẢ</a>';
    }
}
?>