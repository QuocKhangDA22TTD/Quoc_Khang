


<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NỘI DUNG</title>
    <link rel="stylesheet" href="../../assets/css/base.css">
    <style>
        pre {
            white-space: pre-wrap;
            word-wrap: break-word;
            font-size: 2rem;
        }

        a {
            font-size: 2.5rem;
            font-weight: bolder;
        }
    </style>
</head>
<body>
<?php

include '../connect.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    foreach ($_POST as $key => $value) {
        $id = $key;
    }

    $sql = 'SELECT id, content FROM article WHERE id = "'.$id.'"';
    $result = $conn->query($sql);
    $content = $result->fetch_assoc();

    echo '<pre>';
    echo $content['content'];
    echo '</pre>';
    echo '<br><br>';
    echo '<a href="./admin.php">TRANG ADMIN</a>';
}

?>


</body>
</html>