<?php

include '../connect.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    foreach($_POST as $key => $value) {
        $id = $key;
    }

    $sql = "DELETE FROM user WHERE id = $id";
    $result = $conn->query($sql);
    header('location: ./admin.php');
}