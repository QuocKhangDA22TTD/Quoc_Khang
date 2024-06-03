<?php

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    session_start();
    include '../connect.php';

    $name = $_POST['userName_val'];
    $password = $_POST['userPassword_val'];

    $check = "SELECT name, password FROM user WHERE name = '$name' OR password = '$password'";
    $result = $conn->query($check);

    if ($result->num_rows == 0) {
        $sql = "INSERT INTO user(name, password) VALUES('$name', '$password')";
        $conn->query($sql);
        echo "<h1>TẠO TÀI KHOẢN THÀNH CÔNG</h1>";
        echo '<a href="../../index.php">TRANG CHỦ</a>';
        die();
    } else {
        echo "<h1>TÊN HOẶC MẬT KHẨU BỊ TRÙNG VỚI TÀI KHOẢN TRƯỚC ĐÓ</h1>";
        echo '<a href="../../index.php">TRANG CHỦ</a>';
    }
}