<?php
function our_swap(&$a,&$b){
    $temp=$a;
    $a=$b;
    $b=$temp;
}
function sxGiam($arr)
{
    for($i=0;$i<count($arr)-1;$i++)
        for($j=$i+1;$j<count($arr);$j++)
            if($arr[$i] < $arr[$j]) our_swap($arr[$i],$arr[$j]);
    return $arr;
}
function sxTang($arr)
{
    for($i=0;$i<count($arr)-1;$i++)
        for($j=$i+1;$j<count($arr);$j++)
            if($arr[$i] > $arr[$j]) our_swap($arr[$i],$arr[$j]);
    return $arr;
}
if (isset($_POST['submit'])){
    $nhapmang=$_POST['nhapmang'];
    $arr=explode(",",$nhapmang);
    $manggiam = implode(",",sxGiam($arr));
    $mangtang = implode(",",sxTang($arr));
}
?>

<form action="" method="post">
<table class="borderless" align="center">
    <tr>
        <th colspan="2">Sắp xếp mảng</th>
    </tr>
    <tr>
        <td>Nhập mảng</td>
        <td> 
            <input type="text" name="nhapmang" value="<?php if (isset($nhapmang)) echo $nhapmang;?>" size="30"> 
            <span style="color:red;">(*)</span>
        </td>
    </tr>
    <tr>
        <td></td>
        <td>
            <input type="submit" name="submit" value="Sắp xếp tăng/giảm">
        </td>
    </tr>
    <tr>
        <td style="color: red"> <b>Sau khi sắp xếp</b></td>
        <td></td>
    </tr>
    <tr>
        <td>Tăng dần</td>
        <td>
            <input type="text" value="<?php if (isset($mangtang)) echo  $mangtang;?>" size="35">
        </td>
        <td></td>
    </tr>
    <tr>
        <td>Giảm dần</td>
        <td>
            <input type="text" value="<?php if (isset($manggiam)) echo  $manggiam;?>" size="35">
        </td>
        <td></td>
    </tr>
    <tr>
        <td colspan="3" style="text-align: center">
            <b style="color: red">(*)</b> Các số cách nhau bằng dấu "<b style="color: red">,</b>"
        </td>
    </tr>
</table>
</form>
