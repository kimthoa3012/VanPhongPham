<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
if(isset($_POST['submit'])){
    if (isset($_POST['submit'])){
        $text=$_POST['dayso'];
        $arr=explode(",",$text);
        $kq=0;

        foreach ($arr as $value)
            $kq=$kq+$value;
    }
}
?>
    <form action="" method="POST">
        <table class="borderless" align="center">
            <tr>
                <th colspan="2">Nhập và tính trên dãy số</th>
            </tr>
             <tr>
                <td>Nhập dãy số</td>
                <td> <input type="text" name="dayso" size="30" value="<?php if(isset($text)) echo $text;?>"> <span style="color:red">(*)</span></td>
            </tr>
             <tr>
              <td></td>
             <td>
                 <input type="submit" value="Tổng dãy số" name="submit"> 
             </td>
             </tr>
             <tr>
                 <td>Tổng dãy số</td>
                 <td> <input disabled type="text" value="<?php if(isset($kq)) echo $kq;?>"></td>
             </tr>
             <tr>
                <td colspan="2" align="center"><span style="color:red">(*)</span> Các số được nhập cách nhau bằng dấu ","</td>
             </tr>
        </table>
    </form>
</body>
</html>