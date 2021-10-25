<ul>
    <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
    <li><a href="./index.php?page_layout=giohang"><i class="fa fa-shopping-bag"></i> <span>
        <?php
        if(isset($_SESSION['giohang'])){
            echo count($_SESSION['giohang']);
        } else {
            echo '0';
        }
        ?>
        
    </span></a></li>
</ul>
<div class="header__cart__price">item: <span>$150.00</span></div>