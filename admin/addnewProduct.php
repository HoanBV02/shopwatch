<head>
    <title>Add new Product</title>
    <link rel="stylesheet" href="style.css">
    <style>
        input[type=submit] {
            margin-top: 20px;
            padding: 0 10px;
        }
    </style>
</head>
<body>
    
    <div class="main_form">
    <div class="overlay"></div>
    <div class="body">
        <div class="info">
            <div class="container">
                <form action="addnewProduct_action.php" method="post">
                    <table>
                        <tr>
                            <td> Tên sản phẩm </td>
                            <td> <input type="text" name="pro_name"></td>
                        </tr>
                        <tr>
                            <td> Mã danh mục </td>
                            <td> <input type="text" name="cate_id"></td>
                        </tr>
                        <tr>
                            <td> Số lượng  </td>
                            <td> <input type="text" name="quantity"></td>
                        </tr>
                        <tr>
                            <td> Giá </td>
                            <td> <input type="text" name="price"></td>
                        </tr>
                        <tr>
                            <td> Ảnh </td>
                            <td> <input type="file" name="image"></td>
                        </tr>
                        <tr>    
                            <td> Sale </td>
                            <td> <input type="text" name="sale"></td>
                        </tr>
                        <tr>
                            <td> Mô tả </td>
                            <td><textarea name="description" id="" cols="30" rows="10"></textarea></td>
                        </tr>
                        <tr>
                            <td><input type="submit" value="Thêm mới" name="add"></td>
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
