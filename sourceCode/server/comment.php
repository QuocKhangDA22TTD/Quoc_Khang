<?php

    // session_start();

    include_once './connect.php';

    $title = $_SESSION['title'];

    $sql = "SELECT * FROM comment WHERE title = '$title'";
    $result = $conn->query($sql);
?>

<div id="comment">
    <div id="commenting">
        <!-- <form action="./server/ini/comment.ini.php" method="post"> -->
            <textarea name="comment_val" id="comment_input" placeholder="Viết bình luận"></textarea>
            <br>
            <br>
            <input type="submit" onclick="insertComment()" value="gửi">
        <!-- </form> -->
    </div>

    <?php
        if($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) { 
    ?>
    <div class="comments">
        <div id="commentInfo">
            <span id="userName"> <?php echo $row['user']; ?> </span>
            <span id="date"> <?php echo $row['date'] ?> </span>
        </div>
        <div id="commentContent">
            <pre><?php echo $row['content'] ?></pre>
        </div>
    </div>

    <?php 
        }
    }
    ?>
</div>