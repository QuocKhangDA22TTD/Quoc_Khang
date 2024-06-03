<?php


if($_SERVER['REQUEST_METHOD'] == 'POST') {
    session_start();
    include '../connect.php';
    $accountName = $_SESSION['userName'];

    if($accountName == 'Guest') {
        echo '<h1>BẠN CHƯA ĐĂNG NHẬP TÀI KHOẢN NGƯỜI DÙNG</h1>';
        echo '<a href="../../index.php">TRANG CHỦ</a>';
    }
    if($accountName != 'Guest') {
        $title = $_POST['title_val'];
        $content = $_POST['content_val'];
        $image = $_FILES['introImage_val']['name'];
        $major = $_POST['major_val'];
        $author = $accountName;

        echo $image;


        if($title == ''|| $content == '' || $image == '' || $major == '') {
            die(
                '<h1>bài viết không có tiêu đề, nội dung, chuyên ngành hoặc hình ảnh</h1>'.
                '<a href="../../index.php">TRANG CHỦ</a>'
            );
        }
        echo $image;

        $sql = "INSERT INTO article (title, content, image, author, major)
        VALUES ('$title', '$content', '$image', '$author', '$major')";
        echo $image;


        if ($conn->query($sql) === TRUE) {
            echo "ĐĂNG BÀI THÀNH CÔNG";
            echo '<br><a href="../../index.php">TRANG CHỦ</a>';
            header('location: ../../index.php');
        } else {
            echo "TÊN ĐĂNG NHẬP ĐÃ ĐƯỢC SỬ DỤNG";
            echo '<a href="../../index.php">TRANG CHỦ</a>';
        }

        /* Getting file name */
        $filename = $_FILES['introImage_val']['name'];

        /* Location */
        $location = "../../assets/images/".$filename;
        $imageFileType = pathinfo($location,PATHINFO_EXTENSION);
        $imageFileType = strtolower($imageFileType);

        /* Valid extensions */
        $valid_extensions = array("jpg","jpeg","png");

        /* Check file extension */
        if(in_array(strtolower($imageFileType), $valid_extensions)) {
            /* Upload file */
            if(move_uploaded_file($_FILES['introImage_val']['tmp_name'],$location)){
                $imgData = addslashes(file_get_contents($location)); 
            }
        }
    }
}

