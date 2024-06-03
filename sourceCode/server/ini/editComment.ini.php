
<?php

if($_SERVER['REQUEST_METHOD'] == 'POST') {

    include_once '../connect.php';

    $pre_id = $_POST['pre_id'];
    $id = $_POST['id'];
    $user = $_POST['user'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $date = $_POST['date'];

    $edit = "UPDATE comment SET id = $id, user='$user', title='$title', content='$content', date='$date' WHERE id = $pre_id";
    $result = $conn->query($edit);

    header('location: ../admin/admin.php');
} else {
    header('location: ../admin/admin.php');
}