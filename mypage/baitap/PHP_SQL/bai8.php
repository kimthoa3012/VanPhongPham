<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sql Bài 8</title>
</head>
<body>   
<style>
h2 {
    color: #d63031;
    text-transform: uppercase;
}
.image {
    text-align: center;
}
.label {
    font-weight: bold;
    font-style: italic;
}
.link {
    text-align: center;
    margin-top: 15px;
}
</style>

<table align="center" border="1">
    <tr>
        <td colspan="2"><h2 align="center">THÔNG TIN CHI TIẾT CÁC LOẠI SỮA</h2></td>
    </tr>
    <?php
        require ("./mypage/baitap/PHP_SQL/config_bt.php");

        
        if ( ! isset($_GET['page']))
        {
            $_GET['page'] = 1;
        }
        $rowsPerPage=2;
        $perRow =$_GET['page']*$rowsPerPage - $rowsPerPage;

        $sql="Select * from sua LIMIT $perRow, $rowsPerPage";
        $result = $conn->query($sql);
        $totalRow=$conn->query("SELECT * FROM sua")->num_rows;
        $totalPages=($totalRow/$rowsPerPage);
        if($result){

        while ($row = $result->fetch_array()) {
            echo "
                <tr class='title'>
                    <td align='center' colspan ='2' ><h3>{$row['Ten_sua']}</h3></td>
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
                            <div class='back'><span class='label'>Trọng lượng: </span>{$row['Trong_luong']} gr - <span class='label'>Đơn giá:</span> {$row['Don_gia']} VNĐ </div>
                        </td>
                </tr>
            ";
        }}
    ?>
</table>
<?php
 echo "<div class='text-center'>";
    if ($_GET['page'] > 1){
        echo "<a href=" .$_SERVER['REQUEST_URI']."&page=".($_GET['page']-1).">Back</a> ";
    }
    for ($i=1 ; $i<=$totalPages ; $i++)
    {
        if ($i == $_GET['page'])
        {
            echo '<b>'.$i.'</b> '; //trang hiện tại sẽ được bôi đậm
        }
        else echo "<a href=" .$_SERVER['REQUEST_URI']. "&page=".$i."> ".$i."</a> ";
    }
    if ($_GET['page'] < $totalPages) {
        echo "<a href=" . $_SERVER['REQUEST_URI'] . "&page=" . ($_GET['page'] + 1) . ">Next</a>";
    }
    echo "</div>";
 ?>
</body>
</html>