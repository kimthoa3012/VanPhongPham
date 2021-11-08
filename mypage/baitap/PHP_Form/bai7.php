
   <form  action="./index.php?page_layout=baitap&page_bt=1&bai=bai6_ketqua.php" method="post">
      <table class="borderless" align="center">
    <thead>
      <tr>
        <th scope="col" colspan="2">Phép tính trên 2 số</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Chọn phép tính:</td>
            <td>
              <input type="radio" name="pheptinh" id="cong" value="cong">
              <label for="cong">Cộng</label>
              <input type="radio" name="pheptinh" id="tru" value="tru">
              <label for="tru">Trừ</label>
              <input type="radio" name="pheptinh" id="nhan" value="nhan">
              <label for="nhan">Nhân</label>
              <input type="radio" name="pheptinh" id="chia" value="chia">
              <label for="chia">Chia</label>
            </td>
      </tr>
      <tr>
        <td>Số thứ nhất</td>
        <td><input type="text" name="so1" required value="<?php if(isset($so1)) echo $so1 ?>"></td>
      </tr>
      <tr>
        <td>Số thứ hai</td>
        <td><input type="text" name="so2" required value="<?php if(isset($so2)) echo $so2 ?>"></td>
      </tr>
      <tr>
        <td></td>
        <td><input type="submit" name="submit" value="Tính" class="btn btn-success btn-sm"/></td>
      </tr>
    </tbody>
  </table>
     <em  class="text-danger"><?php if(isset($err)) echo $err ?></em>
   </form>
