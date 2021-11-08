<?php
  function taomang($n){
    $arr=array();
    for($i=0;$i<$n;$i++)
    {
        $arr[$i]=rand(-100, 100);
    }
    return $arr;
  }

  function xuatmang($arr){
    return implode(", ", $arr);
  }

  function tong($arr){
    $sum=0;
    foreach($arr as $value) $sum += $value;
    return $sum;
  }

  function timmin($arr){
    $min=$arr[0];
    foreach($arr as $value)
      if($value<$min) $min=$value;
    return $min;
  }
  
  function timmax($arr){
    $max=$arr[0];
    foreach($arr as $value)
      if($value>$max) $max=$value;
    return $max;
  }

  if(isset($_POST['submit'])){
    if (is_numeric($n)) {
      $arr=array();
      $arr=taomang($n);
      $arrStr=xuatmang($arr);
      $min=timmin($arr);
      $max=timmax($arr);
      $sum=tong($arr);
    }else{
      $err="N phải là 1 số";
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
<div class="main">
    <form action="" method="post">
      <table class="borderless" align="center">
        <tr>
          <th colspan="2">Phát sinh mảng và tính toán</th>
        </tr>
        <tr>
          <td>Nhập số phần tử</td>
          <td>
            <input type="number" name="n" class="form-control " value="<?php if(isset($n)) echo $n ?>">
          </td>
        </tr>
        <tr>
          <td></td>
          <td>
            <input type="submit" name="submit" value="Phát sinh và tính toán" class="btn btn-success btn-sm"/>
          </td>
        </tr>
        <tr>
          <td>Mảng</td>
          <td>
            <textarea disabled class="form-control"><?php if(isset($arrStr)) echo $arrStr ?></textarea>
          </td>
        </tr>
        <tr>
          <td>GTLN (MAX) trong mảng</td>
          <td>
            <input type="text" disabled class="form-control" value="<?php if(isset($max)) echo $max ?>">
          </td>
        </tr>
        <tr>
          <td>GTNN (MIN) trong mảng</td>
          <td>
            <input type="text" disabled class="form-control" value="<?php if(isset($min)) echo $min ?>">
          </td>
        </tr>
        <tr>
          <td>Tổng mảng</td>
          <td>
            <input type="text" disabled class="form-control" value="<?php if(isset($sum)) echo $sum ?>">
          </td>
        </tr>
        <tr>
          <td colspan="2">(<span class="text-danger">Ghi chú: </span> Các phần tử trong mảng có giá trị từ 0 đến 20)</td>
        </tr>
      </table>
      <em  class="text-danger"><?php if(isset($err)) echo $err ?></em>
    </form>

  </div>
</body>
</html>

</body>
</html>