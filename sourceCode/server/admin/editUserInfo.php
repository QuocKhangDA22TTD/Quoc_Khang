<?php

include_once '../connect.php';

foreach($_POST as $key => $value) {
    $id = $key;
}

$sql = "SELECT * FROM user WHERE id = $id";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDIT</title>
</head>
<body>
    <div class="containe">
        <form action="../ini/editUserInfo.ini.php" method="post" enctype="multipart/form-data">

            <?php if($result->num_rows > 0) { 
                        while($row = $result->fetch_assoc()) {
            ?>

            <input type="number" style="display: none;" name="pre_id" value="<?php echo $row['id'] ?>">

            <label for="id">ID</label>
            <br>
            <input type="number" name="id" id="id" value="<?php echo $row['id'] ?>">
            <br>
            <label for="name">TÊN</label>
            <br>
            <input type="text" name="name" id="name" value="<?php echo $row['name'] ?>">
            <br>
            <label for="password">MẬT KHẨU</label>
            <br>
            <input type="text" name="password" id="password" value="<?php echo $row['password'] ?>">
            <br>
            <br>

            <input type="submit" value="thực hiện">
            <?php }} ?>

        </form>
    </div>
</body>
</html>