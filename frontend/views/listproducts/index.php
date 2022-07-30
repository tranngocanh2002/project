<?php
require_once 'helpers/Helper.php';
?>

<div class="location">
    <a href="home.html"><p>Trang chủ  </p></a>
    <i class="fas fa-caret-right"></i>
    <a href="san_pham.html"><p>Sản phẩm</p></a>
</div>

<div class="content">
    <div class="filter">
        <div class="danh_muc">
            <div class="head_danh_muc">
                <p>Danh mục</p>
                <i class="fas fa-caret-up"></i>
            </div>

            <div class="list_danh_muc">
                <a href="index.php?controller=listproduct&action=index&id=5"><p>Găng tay thủ môn</p></a>
                <a href="index.php?controller=listproduct&action=index&id=8"><p>Bóng</p></a>
                <a href="san_pham.html"><p>Giày đá bóng</p></a>
                <a href="index.php?controller=news&action=index&id=1"><p>Tin tức</p></a>
                <a href="huong_dan_list_1.html"><p>Hướng dẫn</p></a>
            </div>
        </div>

        <div class="danh_muc">
            <div class="head_danh_muc">
                <p>Thương hiệu</p>
                <i class="fas fa-caret-up"></i>
            </div>

            <div class="list_danh_muc">
                <a href="index.php?controller=listproduct&action=index&id=1"><p>Nike</p></a>
                <a href="index.php?controller=listproduct&action=index&id=2"><p>Adidas</p></a>
                <a href="index.php?controller=listproduct&action=index&id=3"><p>Puma</p></a>
                <a href="index.php?controller=listproduct&action=index&id=4"><p>Mizuno</p></a>
            </div>
        </div>

        <div class="mau_sac">
            <div class="head_danh_muc">
                <p>Màu sắc</p>
                <i class="fas fa-caret-up"></i>
            </div>

            <div class="pick_color">
                <a href="san_pham.html" class="red"></a>
                <a href="san_pham.html" class="blue"></a>
                <a href="san_pham.html" class="brown"></a>
                <a href="san_pham.html" class="black"></a>
                <a href="san_pham.html" class="pink"></a>
                <a href="san_pham.html" class="White"></a>
                <a href="san_pham.html" class="yellow"></a>
                <a href="san_pham.html" class="green"></a>
            </div>
        </div>
    </div>

    <div class="img_info_pro">
        <div class="title_pro">
<!--            <h2>Hàng mới về nè</h2>-->
            <?php
            echo '<pre>';
//            print_r($categories);
            echo '<pre>';
            ?>
        </div>
<!--        --><?php
//        echo '<pre>';
//        print_r($products);
//        echo '<pre>';
//        ?>
        <?php if (!empty($products)): ?>
            <div class="row_pro">
                <?php foreach ($products AS $product):
                    $slug = Helper::getSlug($product['title']);
                    $product_link = "san-pham/$slug/" . $product['id'] . ".html";
                    ?>
                    <div class="product">
                        <div class="img_pro">
                            <a href="<?php echo $product_link; ?>">
                                <img src="../backend/assets/uploads/<?php echo $product['avatar'] ?>" alt="<?php echo $product['title'] ?>">
                            </a>
                        </div>

                        <div class="info_pro">
                            <a href="<?php echo $product_link; ?>">
                                <p><?php echo $product['title'] ?></p>
                            </a>
                            <br>
                            <span><?php echo number_format($product['price'])?>đ</span>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
<!--        --><?php //echo $pages; ?>
    </div>
</div>