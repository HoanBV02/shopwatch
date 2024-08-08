<?php
include 'connect.php';

if (isset($_GET['btnsearch'])) {
    $key = $_GET['search'];
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Product Search Results</title>
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    </head>

    <body>

        <div class="container mt-4">
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Mã loại</th>
                        <th>Tên</th>
                        <th>Số lượng</th>
                        <th>Giá</th>
                        <th>Ảnh</th>
                        <th>Giảm giá</th>
                        <th>Sửa</th>
                        <th>Tình trạng</th>
                    </tr>
                </thead>
                <?php
                $sql = "SELECT * FROM product WHERE pro_name LIKE '%$key%'";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                ?>
                        <tbody>
                            <tr>
                                <td><?php echo $row['pro_id'] ?></td>
                                <td><?php echo $row['cate_id'] ?></td>
                                <td><?php echo $row['pro_name'] ?></td>
                                <td><?php echo $row['quantity'] ?></td>
                                <td><?php echo $row['price'] ?></td>
                                <td><?php echo $row['image'] ?></td>
                                <td><?php echo $row['sale'] ?></td>
                                <td><button class="btn btn-warning"><a href="editProduct.php?pro_id=<?php echo $row['pro_id'] ?>">Sửa</a></button></td>
                                <td>
                                    <?php if ($row['status'] == 1) : ?>
                                        <form method="get" action="deleteProduct.php">
                                            <input type="hidden" name="pro_id" value="<?php echo $row['pro_id']; ?>">
                                            <button type="submit" name="btndel" class="btn btn-danger">Xoá</button>
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
                <?php
                    }
                } else {
                    echo "<tr><td colspan='9'>No result</td></tr>";
                }
                ?>
            </table>
        </div>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    </body>

    </html>

<?php
}
?>
