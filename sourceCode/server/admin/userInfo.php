<?php

include_once '../connect.php';

$sql = 'SELECT * FROM user';
$result = $conn->query($sql);
?>

<h1>QUẢN LÝ THÔNG TIN CHI TIẾT NGƯỜI DÙNG</h1>
<table>
    <tr>
        <th>ID</th>
        <th>TÊN</th>
        <th>MẬT KHẨU</th>
        <th></th>
        <th></th>
    </tr>
    <?php
        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
    ?>

    <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['password']; ?></td>
        <td>
            <form action="./editUserInfo.php" method="post">
                <input type="submit" value="chỉnh sửa" name="<?php echo $row['id'] ;?>">
            </form>
        </td>
        <td>
            <form action="./removeUser.php" method="post">
                <input type="submit" value="xóa" name="<?php echo $row['id'] ;?>">
            </form>
        </td>
    </tr>

    <?php }

    } else {
        echo '<td>KHÔNG CÓ THÔNG TIN NGƯỜI DÙNG NÀO ĐƯỢC LƯU</td>';
    }

    ?>
</table>