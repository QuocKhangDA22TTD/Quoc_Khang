<?php


if($_SERVER['REQUEST_METHOD'] == 'POST') {
    session_start();
    include '../connect.php';
    $name = $_POST['userName_val'];
    $password = $_POST['userPassword_val'];
    $sql = 'SELECT * FROM user WHERE name = "' . $name . '"' . ' AND password = "' . $password . '"';
    $result = $conn->query($sql);

    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo $row['name'];
        $_SESSION['userName'] = $row['name'];
        header('location: ../../index.php');
    } else {
        echo '<h1>SAI TÊN HOẶC MẶC KHẨU</h1>';
        echo '<a href="../../index.php">TRANG CHỦ</a>';
    }
}