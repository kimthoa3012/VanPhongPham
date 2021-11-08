<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sql Bài 5</title>
</head>
<body>   
<style>
</style>
<table align="center" border="1">
    <tr class="title">
        <th colspan ="2" >THÔNG TIN CÁC SẢN PHẨM</td>
    </tr>
    <?php
        require ("./mypage/baitap/PHP_SQL/config_bt.php");
        $query = "select * from sua s   join loai_sua ls on s.Ma_loai_sua = ls.Ma_loai_sua
                                        join hang_sua hs on s.Ma_hang_sua = hs.Ma_hang_sua
                                        LIMIT 10
                    ";
        $result = $conn->query($query);
        if($result){
            while ($row = $result->fetch_array()) {
                echo "<tr>";
                    echo "<td width='150px'><img src='./mypage/baitap/PHP_SQL/img/sua/{$row['Hinh']}' width='100px' height='100px'></td>";
                    echo "<td  width='300px'>
                            <h5 class='pb-4'>{$row['Ten_sua']}</h5>
                            <div class='pb-1'> {$row['Ten_hang_sua']}</div>
                            <div> {$row['Ten_loai']} - {$row['Trong_luong']} gr - {$row['Don_gia']} VNĐ</div>
                           
                    </td>";
                echo "</tr>";
            }
        }
    ?>
</table>
</body>
</html>