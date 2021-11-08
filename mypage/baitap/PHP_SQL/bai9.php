<?php
    if(isset($_POST['submit'])){
        header("location: ./index.php?page_layout=baitap&page_bt=3&bai=9&ok=timkiem&search=".$_POST['search']);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sql Bài 9</title>
</head>
<style>
.title {
    background-color: #fab1a0;
}
.key {
    font-weight: bold;
    text-align: center;
}
.image {
    text-align: center;
    background-color: #fff;
    width: 200px;
    height: 200px;
}

.label {
    font-weight: bold;
    font-style: italic;
    color: #000;
}
.name {
    font-weight: bold;
    color: #d63031;
    display: inline;
}
.infor {
    color: #d63031;
}
</style>
<body>
<div class="top">
    <h2 align="center">TÌM KIẾM THÔNG TIN SỮA</h2>
    <div class="top" align="center">
        <form action="" method="POST">
            <p class="name">Tên sữa: </p><input type="text" name="search" value="<?php if(isset($_GET['name'])) echo $_GET['name']; ?>" />
            <input type="submit" name="submit" value="Tìm kiếm" />
        </form>
    </div>
</div>
<?php
if (isset($_REQUEST['ok'])) 
{
    // Gán hàm addslashes để chống sql injection
    $search = addslashes($_GET['search']);

    if (empty($search)) {
        echo "<h3>Vui long nhập tên sữa/h3>";
    } 
    else
    {   
        require ("./mypage/baitap/PHP_SQL/config_bt.php");
        $query = "select * from sua where Ten_sua like '%$search%'";
        $result = $conn->query($query);
        $num= mysqli_num_rows($result);
        if ($num > 0 && $search != "")
        {
            echo "<p class='key'>Có $num sản phẩm được tìm thấy</p>";

            echo '<table align="center" border="1">';
            while ($row = $result->fetch_array()) {
                echo "
                <tr class='title'>
                    <th colspan ='2' >{$row['Ten_sua']}</th>
                </tr>
                <tr class='box-wrap'>
                        <td class='image'>
                            <img src='./mypage/baitap/PHP_SQL/img/sua/{$row['Hinh']}' class='image'>
                        </td>
                        <td>
                            <div class='label'>Thành phần dinh dưỡng:</div>
                            <div>{$row['TP_Dinh_Duong']}</div>
                            <div class='label'>Lợi ích:</div>
                            <div>{$row['Loi_ich']}</div>
                            <div class='infor'><span class='label'>Trọng lượng: </span>{$row['Trong_luong']} gr - <span class='label'>Đơn giá:</span> {$row['Don_gia']} VNĐ </div>
                        </td>
                </tr>
            ";
            }
            echo '</table>';
        } 
        else {
            echo "<h3>Không tìm thấy sản phẩm này</h3>";
        }
    }
}
?>   
</body>
</html>
