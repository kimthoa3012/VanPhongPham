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
    <div><strong>Bạn đã đăng kí thành công, dưới đây là thông tin bạn nhập</strong></div>
    <?php
      echo "Full Name: " . $_POST['name'] ?? null;
      echo "<br>Sex: " . ($_POST['gender'] ?? null);
      echo "<br>Address: " . ($_POST['address'] ?? null);
      echo "<br>Phone number: " . ($_POST['phone'] ?? null);
      echo "<br>Country: " . ($_POST['country'] ?? null);
      echo "<br>Study: " . join(", ", $_POST['subject'] ?? []) ;
      echo "<br>Note: " . ($_POST['note'] ?? null);
    ?>

    
<p>
  <a href="javascript:window.history.back(-1);" class="btn btn-secondary">Quay lại</a>
</p>
</div>
</body>
</html>

