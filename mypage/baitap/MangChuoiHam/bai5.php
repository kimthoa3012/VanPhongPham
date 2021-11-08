<?php
  if(isset($_POST['submit'])){
    $nhapmang = $_POST['nhapmang'];
    $neednum = $_POST['neednum'];
    $replacenum = $_POST['replacenum'];

    if ($nhapmang && is_numeric($neednum) && is_numeric($replacenum)) {
      $arr = explode(',', $nhapmang);
      $arrold = implode(' ', $arr);
      foreach($arr as $i => $v)  {
        if ($v == $neednum) {
          $arr[$i] = (int)$replacenum;
        }
      }
      $arrnew = implode(' ', $arr);
    }else{
      $err="Giá trị không hợp lệ.";
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="">
    <form action="" method="post">
      <table  class="borderless" align="center">
        <tr>
          <th  colspan="2">THAY THẾ</th>
        </tr>
        <tr>
          <td>Nhập các phần tử</td>
          <td style="width: 300px">
            <input type="text" name="nhapmang" class="form-control" value="<?php if(isset($nhapmang)) echo $nhapmang;  ?>">
          </td>
        </tr>
        <tr>
          <td>Giá trị cần thay thế</td>
          <td>
            <input type="number" name="neednum" class="form-control" value="<?php if(isset($neednum)) echo $neednum ?>">
          </td>
        </tr>
        <tr>
          <td>Giá trị thay thế</td>
          <td>
            <input type="number" name="replacenum" class="form-control" value="<?php if(isset($raplacenum)) echo $replacenum ?>">
          </td>
        </tr>
        <tr>
          <td></td>
          <td>
            <input type="submit" name="submit" value="Thay thế" class="btn btn-success btn-sm"/>
          </td>
        </tr>
        <tr>
          <td>Mảng cũ</td>
          <td>
            <input type="text" disabled class="form-control" value="<?php if(isset($arrold)) echo $arrold; ?>">
          </td>
        </tr>
        <tr>
          <td>Mảng sau khi thay thế</td>
          <td>
            <input type="text" disabled class="form-control form-control-sm" value="<?php if(isset($arrnew)) echo $arrnew; ?>">
          </td>
        </tr>
        <tr>
          <td colspan="2">(<span style="color: red" class="text-danger">Ghi chú:</span> Các phần tử trong mảng cách nhau bởi dấu ",")</td>
        </tr>
      </table>
      <em  class="text-danger"><?php if(isset($err)) echo $err ?></em>
    </form>
  </div>
</body>
</html>

  
</html>