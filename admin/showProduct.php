<?php

    function showProduct() { 
        include 'connect.php'?>
<div class="details active"> 
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Danh sách hàng</h2>
                       
                        <form class="searchForm" action="searchProduct.php" method="GET">
                            <input type="text" name="search" placeholder="Tìm kiếm...">
                            <button type="submit" name="btnsearch" class="btn btn-primary">Tìm kiếm</button>
                        </form>
                        <a href="addnewProduct.php" class="btn">Thêm mới</a>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <td>ID</td>
                                <td>Mã loại</td>
                                <td>Tên</td>
                                <td>Số lượng</td>
                                <td>Giá</td>
                                <td>Ảnh</td>
                                <td>Giảm giá</td>
                                <td>Sửa</td>
                                <td>Tình trạng</td>
                            </tr>
                        </thead>
                        <?php
                        $sql = "select * from product";
                        $result = $conn->query($sql);
                        if($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) { ?>
                                <tbody>
                                    <tr>
                                        <td><?php echo $row['pro_id']?></td>
                                        <td><?php echo $row['cate_id']?></td>
                                        <td><?php echo $row['pro_name']?></td>
                                        <td><?php echo $row['quantity']?></td>
                                        <td><?php echo $row['price']?></td>
                                        <td><?php echo $row['image']?></td>
                                        <td><?php echo $row['sale']?></td>
                                        <td><button ><a href="editProduct.php?pro_id=<?php echo $row['pro_id']?>">Sửa</a></button></td>
                                        <td>
                                        <?php if ($row['status'] == 1) : ?>
                                            <form method="get" action="deleteProduct.php">
                                                <input type="hidden" name="pro_id" value="<?php echo $row['pro_id']; ?>">
                                                <button type="submit" name="btndel" class="btn btn-primary">Xoá</button>
                                            </form>
                                        <?php endif; ?>

                                        <?php if ($row['status'] == 0) : ?>
                                            <form method="get" action="deleteProduct.php">
                                                <input type="hidden" name="pro_id" value="<?php echo $row['pro_id']; ?>">
                                                <button type="submit" name="btrendel" class="btn btn-primary">Bán lại</button>
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


