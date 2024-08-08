<?php
function showComment() { 
        include 'connect.php'?>

        <div class="details comment">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Danh sách bình luận</h2>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <td>Mã</td>
                                <td>Mã sản phẩm</td>
                                <td>Mã người dùng</td>
                                <td>Nội dung</td>
                                <td>Thời gian</td>
                                
                            </tr>
                        </thead>
                        <?php
                        $sql = "select * from comment";
                        $result = $conn->query($sql);
                        if($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) { ?>
                                <tbody>
                                    <tr>
                                        <td><?php echo $row['cmt_id']?></td>
                                        <td><?php echo $row['pro_id']?></td>
                                        <td><?php echo $row['u_id']?></td>
                                        <td><?php echo $row['content']?></td>
                                        <td><?php echo $row['date_time']?></td>                                       
                                    
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
