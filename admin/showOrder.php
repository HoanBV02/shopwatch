<?php
function showOrder() { 
    include 'connect.php';
?>
    <div class="details order">
        <div class="recentOrders">
            <div class="cardHeader">
                <h2>Danh sách đặt hàng</h2>
            </div>
            <table>
                <thead>
                    <tr>
                        <td>Mã đơn</td>
                        <td>Tên sản phẩm</td>
                        <td>Người đặt đơn</td>
                        <td>Số lượng</td>
                        <td>Thành tiền</td>
                        <td>Địa chỉ</td>
                        <td>Thời gian đặt</td>
                    </tr>
                </thead>
                <?php
                $sql = "SELECT * FROM order_detail";
                $result = $conn->query($sql);

                if ($result) {
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                ?>
                            <tbody>
                                <tr>
                                    <td><?php echo $row['o_id']; ?></td>
                                    <td><?php echo $row['pro_name']; ?></td>
                                    <td><?php echo $row['fullname']; ?></td>
                                    <td><?php echo $row['quantity']; ?></td>
                                    <td><?php echo $row['price']; ?></td>
                                    <td><?php echo $row['address']; ?></td>
                                    <td><?php echo $row['date_time']; ?></td>
                                </tr>
                            </tbody>
                <?php
                        }
                    } else {
                        echo "No result";
                    }
                } else {
                    echo "Error: " . $conn->error;
                }
                ?>
            </table>
        </div>
    </div>
<?php
    $conn->close();
}
?>
