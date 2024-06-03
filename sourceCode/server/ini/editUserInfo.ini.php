
<?php

if($_SERVER['REQUEST_METHOD'] == 'POST') {

    include_once '../connect.php';

    $pre_id = $_POST['pre_id'];
    $id = $_POST['id'];
    $name = $_POST['name'];
    $password = $_POST['password'];

    $edit = "UPDATE user SET id = $id, name='$name', password='$password' WHERE id = $pre_id";
    $result = $conn->query($edit);

    header('location: ../admin/admin.php');
} else {
    header('location: ../admin/admin.php');
}