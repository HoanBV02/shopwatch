<?php
include 'connect.php';

if (isset($_GET['btnsearch'])){
    $key = $_GET['search'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>User Search Results</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-4">
    <table class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th>Mã người dùng</th>
                <th>Tên đăng nhập</th>
                <th>Email</th>
                <th>Mật khẩu</th>
                <th>Tình trạng</th>
                <th>Xoá</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM user WHERE u_name LIKE '%$key%'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
            ?>
                    <tr>
                        <td><?php echo $row['u_id'] ?></td>
                        <td><?php echo $row['u_name'] ?></td>
                        <td><?php echo $row['email'] ?></td>
                        <td><?php echo $row['password'] ?></td>
                        <td><?php echo $row['status'] ?></td>
                        <td><button class="btn btn-danger"><a href="#">Xoá</a></button></td>
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

<!-- Bootstrap JS and Popper.js -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>

<?php
}
?>
