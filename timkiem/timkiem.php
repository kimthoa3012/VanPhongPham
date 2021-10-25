<script type="text/javascript">
    function searchFocus(){
        if(document.sform.text.value == 'Sản phẩm bạn cần?'){
            document.sform.text.value='';
        }
    }

    function searchBlur(){
        if(document.sform.text.value == ''){
            document.sform.text.value='Sản phẩm bạn cần?';
        }
    }
</script>
<div class="hero__search__form">
    <form action="./index.php?page_layout=ds_timkiem" name="sform" method="POST" >
        <div class="hero__search__categories">
            Tên sản phẩm
        </div>
        <input onfocus="searchFocus();" onblur="searchBlur();" type="text" value="Sản phẩm bạn cần?" name="text">
        <button type="submit" class="site-btn" name="submit">Tìm kiếm</button>
    </form>
</div>

