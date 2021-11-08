
<h3 align="center">THÔNG TIN BÁN SỮA</h3>
<table align="center" border="true">
    <tr>
        <th>Mã HS</th>
        <th>Tên hãng sữa</th>
        <th>Địa chỉ</th>
        <th>Điện thoại</th>
        <th>Email</th>
    </tr>
    <?php
        require ("./mypage/baitap/PHP_SQL/config_bt.php");
        $query = "select * from hang_sua";
        $result = $conn->query($query);
        if($result){
            while ($row = $result->fetch_array()) {
            echo "<tr>";
            for ($i=0; $i<$result->field_count; $i++)
                echo "<td>".$row[$i]."</td>";
            echo "</tr>";
            }
        }
    ?>
</table>