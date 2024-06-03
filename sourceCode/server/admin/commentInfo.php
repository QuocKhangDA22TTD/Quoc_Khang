<?php

include_once '../connect.php';

$getComemntInfo = 'SELECT * FROM comment';
$result = $conn->query($getComemntInfo);

?>

<h1>QUẢN LÝ THÔNG TIN BÌNH LUẬN</h1>
<table>
    <tr>
        <th>ID</th>
        <th>USER</th>
        <th>TITLE</th>
        <th>CONTENT</th>
        <th>DATE</th>
        <th></th>
        <th></th>
    </tr>

    <?php

    if($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
    ?>

    <tr>
        <td><?php echo $row['id'] ?></td>
        <td><?php echo $row['user'] ?></td>
        <td><?php echo $row['title'] ?></td>
        <td><?php echo $row['content'] ?></td>
        <td><?php echo $row['date'] ?></td>
        <td>
            <form action="./editComment.php" method="post">
                <input type="submit" value="chỉnh sửa" name="<?php echo $row['id'] ?>">
            </form>
        </td>
        <td>
            <form action="./removeComment.php" method="post">
                <input type="submit" value="xóa" name="<?php echo $row['id'] ?>">
            </form>
        </td>
    </tr>

    <?php
        }
    } else {
        echo '<tr>';
        echo '<td colspan="5" style="font-weight: bolder;">KHÔNG CÓ DỮ LIỆU</td>';
        echo '</tr>';
    }

    ?>
</table>