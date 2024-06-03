
<?php

include_once '../connect.php';

foreach($_POST as $key => $value) {
    $id = $key;
}

$sql = "SELECT * FROM comment WHERE id = $id";
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
        <form action="../ini/editComment.ini.php" method="post" enctype="multipart/form-data">

            <?php if($result->num_rows > 0) { 
                        while($row = $result->fetch_assoc()) {
            ?>

            <input type="number" style="display: none;" name="pre_id" value="<?php echo $row['id'] ?>">

            <label for="id">ID</label>
            <br>
            <input type="number" name="id" id="id" value="<?php echo $row['id'] ?>">
            <br>
            <label for="user">NGƯỜI DÙNG</label>
            <br>
            <input type="text" name="user" id="user" value="<?php echo $row['user'] ?>">
            <br>
            <label for="title">TIÊU ĐỀ</label>
            <br>
            <input type="text" name="title" id="title" value="<?php echo $row['title'] ?>">
            <br>
            <label for="content">NỘI DUNG</label>
            <br>
            <textarea name="content" id="content"><?php echo $row['content'] ?></textarea>
            <br>
            <label for="date">NGÀY ĐĂNG</label>
            <br>
            <textarea name="date" id="date"><?php echo $row['date'] ?></textarea>
            <br>
            

            <input type="submit" value="thực hiện">
            <?php }} ?>

        </form>
    </div>
</body>
</html>