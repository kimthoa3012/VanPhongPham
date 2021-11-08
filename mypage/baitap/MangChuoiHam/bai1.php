<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CSS</title>
    
</head>
<body>

<?php
if (isset($_POST['submit'])){
    $n=$_POST['n'];
    $ketqua="";
    if (is_numeric($n)&& $n>1){
        $arr=array();
        for($i=0;$i<$n;$i++)
        {
            $x=rand();
            $arr[$i]=$x;
        }
        $ketqua="Mảng được tạo là: " .implode(" ",$arr)."\n";

        $count=0;
        foreach ($arr as $i){
            if($i%2==0) $count++;
        }
        if ($count==2) $ketqua.="Có $count số chẵn trong mảng \n";

        $count=0;
        foreach ($arr as $i){
            if($i<100) $count++;
        }
        $ketqua.="Có $count phần tử < 100: \n";

        $sum=0;
        foreach ($arr as $i){
            if($i<0) $sum=$sum+$i;
        }
        $ketqua.="Tổng các phần tử có giá trị âm: $sum \n";

        $index="";
        foreach ($arr as $key=>$value){
            if ($value==0) $index .= $key;
        }
        if ($index!="") $ketqua.="Vị trí các pt = 0: $index \n";
        else $ketqua.="Không có pt có gia tri = 0: \n";

        asort($arr);
        $ketqua.="mảng sắp xếp: \n" .implode(" ",$arr)."\n";
    } else $ketqua="N phải là số > 0. Mời nhập lại.";
};
?>

<form action="" method="post">
    <table class="borderless" align="center">
  
    <tr>
    <th colspan="2">Thực hiện các phép tính</td>
    </tr>
    <tr>
       <td>Nhập n </td>
       <td> <input type="text" name="n" value="<?php if(isset($n)) echo $n; ?>"> </td> 
    </tr>
    
    <tr>
        <td>Kết quả</td>
        <td><textarea name="ketqua" cols="30" rows="5" readonly><?php if (isset($ketqua)) echo $ketqua;?></textarea> </td>
    </tr>
    <tr>
         <td></td>
         <td>
            <input type="submit" value="Thực hiện" name="submit"> 
        </td>
    </tr>
    </table>
</form>
</body>
</html>