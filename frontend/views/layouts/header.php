<div class="head">
    <div class="head_page">
        <div class="logo_page">
            <a href="home.html"><img src="assets/imagers/logo.png" alt=""></a>
        </div>

        <div class="search">
            <form action="" class="form_search">
                <input type="search" placeholder="Nhập từ khóa cần tìm">
                <a href=""><i class="fas fa-search"></i></a>
            </form>
        </div>

        <div class="cart">
            <a href="gio-hang-cua-ban.html" class="cart-number">
                <i class="fas fa-shopping-cart"></i>
                <?php
                $cart_total = 0;
                if (isset($_SESSION['cart'])) {
                    foreach ($_SESSION['cart'] AS $cart) {
                        $cart_total += $cart['quantity'];
                    }
                }
                ?>
                <span class="cart-amount">
                                <?php echo $cart_total; ?>
                            </span>
            </a>
        </div>
    </div>
    <hr>

    <div class="head_tab">
        <div class="tab_show">
            <ul class="text_tab">
                <li>
                    <a href="san_pham.html" class="border_box">
                        Sản phẩm
                        <i class="fas fa-sort-down"></i>
                    </a>
                    <ul class="text_tab_child1">
                        <?php foreach ($categories as $category):?>
                        <a href="index.php?controller=listproduct&action=index&id=<?php echo $category['id']?>">
                            <li>
                                <?php echo $category['name'] ?>
                            </li>
                        </a>
                        <?php endforeach; ?>
                    </ul>
                </li>
                <li>
                    <a href="index.php?controller=news&action=index&id=1">
                        Tin tức
                        <i class="fas fa-sort-down"></i>
                    </a>
                    <ul class="text_tab_child2">
                        <?php foreach ($newsall as $new):?>
                            <a href="index.php?controller=news&action=index&id=<?php echo $new['id']?>">
                                <li>
                                    <?php echo $new['title'] ?>
                                </li>
                            </a>
                        <?php endforeach; ?>
                    </ul>
                </li>
                <li>
                    <a href="huong_dan_list_1.html">
                        Hướng dẫn
                        <i class="fas fa-sort-down"></i>
                    </a>
                    <ul class="text_tab_child3">
                        <a href="huong_dan_list_1.html"><li>Hướng dẫn đặt hàng</li></a>
                        <a href="huong_dan_list_2.html"><li>Hướng dẫn thanh toán</li></a>
                        <a href="huong_dan_list_3.html"><li>Chính sách bán hàng</li></a>
                        <a href="huong_dan_list_4.html"><li>Câu hỏi thường gặp</li></a>
                        <a href="gioi_thieu.html"><li>Giới thiệu</li></a>
                    </ul>
                </li>
            </ul>
        </div>

        <div class="tab_hotline">
            <samp>Hotline:</samp>
            <P>078.246.5555-0923.833.666</P>
        </div>
    </div>
    <hr>
</div>

<!--<div class="location">-->
<!--    <a href="home.html"><p>Trang chủ  </p></a>-->
<!--    <i class="fas fa-caret-right"></i>-->
<!--    <a href="san_pham.html"><p>--><?php //echo $category['name'] ?><!--</p></a>-->
<!--</div>-->
