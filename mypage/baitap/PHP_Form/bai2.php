<?php
  define("PI", 3.14);
  if(isset($_POST['submit'])){
    $bankinh=$_POST['bankinh'];
    if ($bankinh !== 0) {
      if (is_numeric($bankinh)) {
        $dientich = PI * $bankinh * $bankinh;
        $chuvi = 2 * PI * $bankinh;
      } else {
        $err='Bán kính hình tròn là số';
      }
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bai 2</title>
</head>

<body>
 <div class="">
   <form  action="" method="post">
      <table class="borderless" align="center">
    <thead>
      <tr>
        <th scope="col" colspan="2" style="text-transform: uppercase;">Diện tích và chu vi hình tròn</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Bán kính:</td>
        <td><input type="number" name="bankinh" required value="<?php if(isset($bankinh)) echo $bankinh ?>"/></td>
      </tr>
      <tr>
        <td>Diện tích</td>
        <td><input type="text" disabled="disabled" value="<?php if(isset($dientich))  echo $dientich ?>"/></td>
      </tr>
      <tr>
        <td>Chu vi</td>
        <td><input type="text" disabled="disabled" value="<?php if(isset($chuvi))  echo $chuvi ?>"/></td>
      </tr>
      <tr>
        <td></td>
        <td><input type="submit" name="submit" value="Tính" class="btn btn-success btn-sm"/></td>
      </tr>
    </tbody>
  </table>
     <em  class="text-danger"><?php if(isset($err)) echo $err ?></em>
   </form>
   
 </div>
</body>

  