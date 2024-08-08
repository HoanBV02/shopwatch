<head>
    <title>Edit Banner</title>
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
    if(isset($_GET['idbn'])){
        $id = $_GET['idbn'];
        $sql="SELECT * FROM banner WHERE idbn = '$id'";
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
                <form action="editBanner_action.php?idbn=<?php echo $row['idbn']?>" method="post">
                    <table>
                        <tr>
                            <td> Tên banner </td>
                            <td> <input type="text" name="namebn" value="<?php echo $row['name'] ?>"></td>
                        </tr>
                        <tr>
                            <td> Mã sản phẩm </td>
                            <td> <input type="text" name="pro_id" value="<?php echo $row['pro_id'] ?>"></td>
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
