<?php
function showBanner() { 
        include 'connect.php'?>

        <div class="details customer active">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Danh sách banner</h2>
                    </div>
                    <table class="table table-bordered table-striped">
    <thead class="thead-dark">
        <tr>
            <th>Tên ảnh</th>
            <th>Mã sản phẩm</th>
            <th>Xoá</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $sql = "SELECT * FROM banner";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
        ?>
                <tr>
                    <td><?php echo $row['name'] ?></td>
                    <td><?php echo $row['pro_id'] ?></td>
                    <td><button ><a href="editBanner.php?idbn=<?php echo $row['idbn']?>">Sửa</a></button></td>
                </tr>
        <?php
            }
        } else {
            echo "<tr><td colspan='6'>No result</td></tr>";
        }
        ?>
    </tbody>
</table>

                </div>
            </div>
    <?php }
?>
