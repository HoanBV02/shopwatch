<?php
function showCustomer() { 
        include 'connect.php'?>

        <div class="details customer active">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Danh sách khách hàng</h2>
                        <form class="searchForm" action="searchCus.php" method="GET">
                            <input type="text" name="search" placeholder="Tìm kiếm...">
                            <button type="submit" name="btnsearch" class="btn btn-primary">Tìm kiếm</button>
                        </form>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <td>Mã người dùng</td>
                                <td>Tên đăng nhập</td>
                                <td>Email</td>
                                <td>Mật khẩu</td>
                                <td>Tình trạng</td>
                                <td>Xoá</td>
                            </tr>
                        </thead>
                        <?php
                        $sql = "select * from user";
                        $result = $conn->query($sql);
                        if($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) { ?>
                                <tbody>
                                    <tr>
                                        <td><?php echo $row['u_id']?></td>
                                        <td><?php echo $row['u_name']?></td>
                                        <td><?php echo $row['email']?></td>                                        
                                        <td><?php echo $row['password']?></td>                                        
                                       <td>
                                        <?php
                                        if ($row['status'] == 1) {
                                            echo "Hoạt động";
                                        } else {
                                            echo "Đã khoá";
                                        }
                                        ?>
                                    </td>                                      
                                    <td>
    <?php if ($row['status'] == 1) : ?>
        <form method="get" action="deleteCus.php">
            <input type="hidden" name="u_id" value="<?php echo $row['u_id']; ?>">
            <button type="submit" name="block" class="btn btn-primary">Khoá</button>
        </form>
    <?php endif; ?>

    <?php if ($row['status'] == 0) : ?>
        <form method="get" action="deleteCus.php">
            <input type="hidden" name="u_id" value="<?php echo $row['u_id']; ?>">
            <button type="submit" name="unlock" class="btn btn-primary">Mở khoá</button>
        </form>
    <?php endif; ?>
</td>
</tr>

                                </tbody>
                        <?php }
                        } else {
                            echo "no result";
                        }
                        ?>
                    </table>
                </div>
            </div>
    <?php }
?>
