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
    <form action="./index.php?page_layout=baitap&page_bt=1&bai=bai8_config.php" method="post">
      <fieldset class="border p-4 mx-auto" style="width: max-content">
        <legend class="w-auto">Enter your information</legend>
        <table class="borderless" align="center">
          <tbody>
            <tr>
              <td>Full name</td>
              <td><input type="text" name="name" class="form-control"></td>
            </tr>
            <tr>
              <td>Address</td>
              <td><input type="text" name="address" class="form-control"></td>
            </tr>
            <tr>
              <td>Phone number</td>
              <td><input type="text" name="phone" class="form-control"></td>
            </tr>
            <tr>
              <td>Sex</td>
              <td>
                <input type="radio" name="gender" id="male" value="Nam">
                <label for="male">Nam</label>
                <input type="radio" name="gender" id="female" value="Nữ">
                <label for="female">Nữ</label>
              </td>
            </tr>
            <tr>
              <td>Country</td>
              <td>
                <select name="country" class="form-control">
                  <option>Việt Nam</option>
                  <option>Anh</option>
                  <option>Nga</option>
                  <option>Hoa Kì</option>
                </select> 
              </td>
            </tr>
            <tr>
              <td>Study</td>
              <td>
                <input type="checkbox" name="subject[]" id="php_mysql" value="PHP & MySQL">
                <label for="php_mysql">PHP & MySQL</label>
                <input type="checkbox" name="subject[]" id="cs" value="C#">
                <label for="cs">C#</label>
                <input type="checkbox" name="subject[]" id="xml" value="XML">
                <label for="xml">XML</label>
                <input type="checkbox" name="subject[]" id="py" value="Python">
                <label for="py">Python</label>
              </td>
            </tr>
            <tr>
              <td>Note</td>
              <td>
                <textarea name="note"  class="form-control" cols="40" rows="4"></textarea>
              </td>
            </tr>
            <tr>
              <td></td>
              <td>
                <input type="submit" value="Gửi" class="btn btn-success">
                <input type="reset" value="Hủy" class="btn btn-secondary">
              </td>
            </tr>
          </tbody>
        </table>
      </fieldset>
    </form>
  </div>
</body>
</html>

  