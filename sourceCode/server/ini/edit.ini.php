<?php

if($_SERVER['REQUEST_METHOD'] == 'POST') {

    include_once '../connect.php';

    $pre_id = $_POST['pre_id'];
    $id = $_POST['id'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $image = $_FILES['image']['name'];
    if($image == null) {
        $image = $_POST['pre_image'];
    }
    $author = $_POST['author'];
    $postingTime = $_POST['postingTime'];
    $major = $_POST['major'];
    $view = $_POST['view'];
    $search = $_POST['search'];

    $edit = "UPDATE article SET id = $id, title='$title', content='$content', image='$image', author='$author', postingTime='$postingTime', major='$major', view=$view, search=$search WHERE id=$pre_id";
    $result = $conn->query($edit);

    /* Getting file name */
    $filename = $_FILES['image']['name'];

    /* Location */
    $location = "../../assets/images/".$filename;
    $imageFileType = pathinfo($location,PATHINFO_EXTENSION);
    $imageFileType = strtolower($imageFileType);
    
    /* Valid extensions */
    $valid_extensions = array("jpg","jpeg","png");
    
    /* Check file extension */
    if(in_array(strtolower($imageFileType), $valid_extensions)) {
        /* Upload file */
        if(move_uploaded_file($_FILES['image']['tmp_name'],$location)){
            $imgData = addslashes(file_get_contents($location)); 
        }
    }

    header('location: ../admin/admin.php');
} else {
    header('location: ../admin/admin.php');
}