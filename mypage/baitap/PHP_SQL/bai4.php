
<?php
require('./mypage/baitap/PHP_SQL/config_bt.php');

$rowsPerPage=5;
if (!isset($_GET['page']))
{
    $_GET['page'] = 1;
}
$perRow=$_GET['page']*$rowsPerPage-$rowsPerPage;

$query="Select * from sua LIMIT $perRow, $rowsPerPage";
$result = $conn->query($query);
//$numRows= $result->num_rows;
$totalRow=$conn->query("SELECT * FROM sua")->num_rows;
$totalPages=($totalRow/$rowsPerPage);

//print_r(mysqli_fetch_array($result));
if($result->num_rows<>0)
{
    echo "<h3> THÔNG TIN SỮA </h3>";
    echo "<table align='center' border='1'>";
    echo "<tr>
	    	<th>Số TT</th>
	     	<th>Tên sữa</th>
	    	<th>Hãng sữa</th>
	    	<th>Loại sữa</th>
			<th>Trọng lượng</th>
			<th>Đơn giá</th>
		
		</tr>";

    while($rows=mysqli_fetch_array($result))
    {
        echo "<tr>";
            echo "<td>{$rows['Ma_sua']}</td>";
            echo "<td>{$rows['Ten_sua']}</td>";
            echo "<td>{$rows['Ma_hang_sua']}</td>";
            echo "<td>{$rows['Ma_loai_sua']}</td>";
            echo "<td>{$rows['Trong_luong']}</td>";
            echo "<td>{$rows['Don_gia']} VNĐ</td>";
        echo "</tr>";
    }
    echo"</table>";
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

}
mysqli_close($conn);
?>