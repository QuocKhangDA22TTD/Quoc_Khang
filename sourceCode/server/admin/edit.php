<?php

include_once '../connect.php';

foreach($_POST as $key => $value) {
    $id = $key;
}

$sql = "SELECT * FROM article WHERE id = '$id'";
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
        <form action="../ini/edit.ini.php" method="post" enctype="multipart/form-data">

            <?php if($result->num_rows > 0) { 
                        while($row = $result->fetch_assoc()) {
            ?>

            <input type="text" style="display: none;" name="pre_image" value="<?php echo $row['image'] ?>">

            <input type="number" style="display: none;" name="pre_id" value="<?php echo $row['id'] ?>">

            <label for="id">ID</label>
            <br>
            <textarea name="id" id="id"><?php echo $row['id'] ?></textarea>
            <br>

            <label for="title">TIÊU ĐỀ</label>
            <br>
            <textarea name="title" id="title"><?php echo $row['title'] ?></textarea>
            <br>

            <label for="content">NỘI DUNG</label>
            <br>
            <textarea name="content" id="content"><?php echo $row['content'] ?></textarea>
            <br>
            <br>

            <label for="image">HÌNH ẢNH</label>
            <br>
            <input type="file" id="image" name="image">
            <div>hình ban đầu: <?php echo $row['image'] ?></div>
            <br>
            <br>

            <label for="author">TÁC GIẢ</label>
            <br>
            <textarea name="author" id="author"><?php echo $row['author'] ?></textarea>
            <br>

            <label for="postingTime">THỜI GIAN</label>
            <br>
            <textarea name="postingTime" id="postingTime"><?php echo $row['postingTime'] ?></textarea>
            <br>

            <label for="major">CHUYÊN NGÀNH</label>
            <br>
            <textarea name="major" id="major"><?php echo $row['major'] ?></textarea>
            <br>

            <label for="view">LƯỢT XEM</label>
            <br>
            <input type="number" name="view" id="view" value="<?php echo $row['view'] ?>">
            <br>

            <label for="search">LƯỢT TÌM KIẾM</label>
            <br>
            <input type="number" name="search" id="search" value="<?php echo $row['search'] ?>">
            <br>
            <br>

            <input type="submit" value="thực hiện">
            <?php }} ?>

        </form>
    </div>
</body>
</html>