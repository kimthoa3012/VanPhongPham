<?php
    $text=$_POST['text'];

    //Loại bỏ khoảng trắng đầu cuối
    $text1 = trim($text);
    $arr_text1 = explode(' ', $text1);
    $textNew = implode('%', $arr_text1);
    $textNew = '%'.$textNew.'%';

    $sql="SELECT * FROM san_pham WHERE sp_ten LIKE ('$textNew') ORDER BY id DESC";
    $result = $conn->query($sql);

?>


<!-- Featured Section Begin -->
<section class="featured spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Kết quả tìm kiếm với từ khóa: <?php echo $text; ?></h2>
                </div>
                <!--<div class="featured__controls">
                    <ul>
                        <li class="active" data-filter="*">All</li>
                        <li data-filter=".oranges">Oranges</li>
                        <li data-filter=".fresh-meat">Fresh Meat</li>
                        <li data-filter=".vegetables">Vegetables</li>
                        <li data-filter=".fastfood">Fastfood</li>
                    </ul>
                </div>-->
            </div>
        </div>
        <div class="row featured__filter">
            <?php
                if($result->num_rows > 0)
                    while($row=$result->fetch_array()){
            ?>

            <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                <div class="featured__item">
                    <div class="featured__item__pic set-bg" data-setbg="image/<?php echo $row['sp_anh']?>">
                        <ul class="featured__item__pic__hover">
                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                            <li><a href="./index.php?page_layout=xemchitiet&sp_id=<?php echo $row['id']?>"><i class="fa fa-info" aria-hidden="true"></i></a></li>
                            <li><a href="./giohang/themhang.php?sp_id=<?php echo $row['id']; ?>"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                    </div>
                    <div class="featured__item__text">
                        <h6><a href="./index.php?page_layout=xemchitiet&sp_id=<?php echo $row['id']?>"><?php echo $row['sp_ten']?></a></h6>
                        <h5><?php echo $row['sp_gia']?> VNĐ</h5>
                    </div>
                </div>
            </div>
            <?php
                    }
            ?>
            
        </div>
        <div class="product__pagination">
                <a href="#">1</a>
                <a href="#">2</a>
                <a href="#">3</a>
                <a href="#"><i class="fa fa-long-arrow-right"></i></a>
            </div>
    </div>
</section>