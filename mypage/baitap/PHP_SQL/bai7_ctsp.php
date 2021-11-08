<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sql Bài 7 Detail</title>
</head>
<body>   
<style>
tr th {
    color: #d63031;
}
.image {
    text-align: center;
    width: 200px;
}
.back {
    text-align: end;
}
.label {
    font-weight: bold;
    font-style: italic;
}
table { 
    width: 80%;
}
</style>  
<?php
require("./mypage/baitap/PHP_SQL/config_bt.php");
$Ma_sp = $_GET['Ma_sp'];
$query = "SELECT * FROM sua WHERE Ma_sua = '$Ma_sp'";
$result = $conn->query($query);

if($result){
$row = $result->fetch_assoc();

$Hinh = $row['Hinh'];
$Ten_sua = $row['Ten_sua'];
$TP_Dinh_Duong = $row['TP_Dinh_Duong'];
$Loi_ich = $row['Loi_ich'];
$Trong_luong = $row['Trong_luong'];
$Don_gia = $row['Don_gia'];
?>
<table align="center" border="1">
    <tr class='title'>
        <th colspan ='2' ><?= $Ten_sua; ?></th>
    </tr>
    <tr class='box-wrap'>
            <td class='image'>
                <img src='./mypage/baitap/PHP_SQL/img/sua/<?= $Hinh; ?>' class='image'>
            </td>
            <td>
                <p class='label'>Thành phần dinh dưỡng:</p>
                <p><?= $TP_Dinh_Duong; ?></p>
                <p class='label'>Lợi ích:</p>
                <p><?= $Loi_ich; ?></p>
                <p class='back'><span class='label'>Trọng lượng: </span><?= $Trong_luong; ?> gr - <span class='label'>Đơn giá:</span> <?= $Don_gia; ?> VNĐ </p>
            </td>
    </tr>
    <tr>
        <td class='back'><a href='javascript:window.history.back(-1);'>Quay về</a></td>
        <td></td>
    </tr>
   
</table>
<?php } ?>
</body>
</html>