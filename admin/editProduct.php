<head>
    <title>Edit Product</title>
    <link rel="stylesheet" href="style.css">
    <style>
        input[type=submit] {
            margin-top: 20px;
            padding: 0 10px;
        }
    </style>
</head>
<?php
    include "connect.php";
    if(isset($_GET['pro_id'])){
        $pro_id = $_GET['pro_id'];
        $sql="SELECT * FROM product WHERE pro_id = '$pro_id'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
    }
?>
<body>
    
    <div class="main_form">
    <div class="overlay"></div>
    <div class="body">
        <div class="info">
            <div class="container">
                <form action="editProduct_action.php?pro_id=<?php echo $row['pro_id']?>" method="post">
                    <table>
                        <tr>
                            <td> Tên sản phẩm </td>
                            <td> <input type="text" name="pro_name" value="<?php echo $row['pro_name'] ?>"></td>
                        </tr>
                        <tr>
                            <td> Mã danh mục </td>
                            <td> <input type="text" name="cate_id" value="<?php echo $row['cate_id'] ?>"></td>
                        </tr>
                        <tr>
                            <td> Số lượng  </td>
                            <td> <input type="text" name="quantity" value="<?php echo $row['quantity'] ?>"></td>
                        </tr>
                        <tr>
                            <td> Giá </td>
                            <td> <input type="text" name="price" value="<?php echo $row['price'] ?>"></td>
                        </tr>
                        <tr>
                            <td> Ảnh </td>
                            <td> <input type="file" name="image"></td>
                        </tr>
                        <tr>    
                            <td> Sale </td>
                            <td> <input type="text" name="sale" value="<?php echo $row['sale'] ?>"></td>
                        </tr>
                        <tr>    
                            <td> Mô tả </td>
                            <td><textarea name="description" id="" cols="30" rows="10"><?php echo $row['description']?></textarea></td>
                        </tr>
                        <tr>
                            <td><input type="submit" value="Cập nhật" name="edit"></td>
                        </tr>
                    </table>
                </form>
            </div>
            <div class="close">
                &times
            </div>
        </div>
    </div>
    </div>

    <script>
        let close = document.querySelector(".close");
        close.onclick = function() {
            window.location="http://localhost/doan/admin/";
        }
    </script>
</body>    
