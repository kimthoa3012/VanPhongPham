   <?php
   if(isset($_POST['submit'])){
      $chieudai=$_POST['chieudai'];
      $chieurong=$_POST['chieurong'];
     if ($chieudai > 0 && $chieurong > 0 && $chieurong>$chieudai){
         $dientich = $chieudai * $chieurong;
     } else {
       $dientich = "Giá trị hập không hợp lệ";
     }}
   ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
<body>
 <div class="">
   <form  class="borderless" align="center">
      <table class="borderless" align="center">
    <thead>
      <tr>
        <th scope="col" colspan="2" style="text-transform: uppercase;">Diện tích hình chữ nhật</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Chiều dài</td>
        <td><input type="number" name="chieudai" required value="<?php if(isset($chieudai)) echo $chieudai ?>"/></td>
      </tr>
      <tr>
        <td>Chiều rộng</td>
        <td><input type="number" name="chieurong" required value="<?php if(isset($chieurong)) echo $chieurong ?>"/></td>
      </tr>
      <tr>
        <td>Diện tích</td>
        <td><input type="text" name="dientich" disabled="disabled" value="<?php if(isset($dientich)) echo $dientich ?>"/></td>
      </tr>
      <tr>
        <td></td>
        <td><input type="submit" name="submit" value="Tính" class="btn btn-success btn-sm"/></td>
      </tr>
    </tbody>
  </table>
     
   </form>
   
 </div>
 
</body>
</html>

