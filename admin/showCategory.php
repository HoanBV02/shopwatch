<?php
function showCategory() { 
        include 'connect.php'?>

        <div class="details category">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Danh mục sản phẩm</h2>
                        <a href="#" class="btn">Thêm mới</a>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <td>Mã loại</td>
                                <td>Tên loại</td>
                                <td>Trạng thái</td>
                                <td>Trạng thái</td>
                            </tr>
                        </thead>
                        <?php
                        $sql = "select * from category";
                        $result = $conn->query($sql);
                        if($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) { ?>
                                <tbody>
                                    <tr>
                                        <td><?php echo $row['cate_id']?></td>
                                        <td><?php echo $row['cate_name']?></td>
                                        <td><?php echo $row['status']?></td>                                        
                                        <td><button><a href="">Xoá</a></button></td>
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
