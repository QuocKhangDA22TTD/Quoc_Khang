<?php

if($_SERVER['REQUEST_METHOD'] == 'GET') {
    $image = $_GET['image'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hình ảnh</title>
    <style>
        #imageOpened{
            text-align: center;
        }

        #imageOpened > img {
            width: 38rem;
            height: 38rem;
            object-fit: contain;
        }
    </style>
</head>
<body>
    <div id="imageOpened">
        <img src="../../assets/images/<?php echo $image; ?>" alt="hình ảnh">
    </div>
</body>
</html>

<?php } else {
    echo '<h1>KHÔNG CÓ HÌNH ẢNH</h1>';
}
