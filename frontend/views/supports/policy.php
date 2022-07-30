<div class="location">
    <a href="home.html"><p>Trang chủ  </p></a>
    <i class="fas fa-caret-right"></i>
    <a href="san_pham.html"><p>Chính sách bán hàng</p></a>
</div>

<div class="content">
    <div class="main_news">
        <h2>Chính sách bán hàng</h2>
        <i>Chính sách giao hàng/ soccerstore.vn- Giày bóng đá chính hãng Nike & Adidas</i>
        <h4>1. Cước phí giao nhận hàng.</h4>
        <p>– vui lòng liên hệ với đại diện của soccerstore.vn để biết thêm chi tiết.</p>
        <h4>2. Thời gian giao nhận hàng.</h4>
        <p>– Giao hàng miễn phí trong nôi thành Hà Nội: nhận hàng trong ngày.</p>
        <p>– Giao hàng chuyển phát nhanh đi các tỉnh: từ 1-4 ngày</p>
        <p>– Giao hàng chuyển phát đi các tỉnh siêu tốc: trong ngày</p>
        <p>– Hoặc theo thỏa thuận, thống nhất giữa đại diện soccertore.vn với quý khách.</p>
        <h4>3. Chính sách bảo hành & đổi trả sản phẩm: </h4>
        <p class="p_inline_block">Xem tại đây</p>
        <a href="">Click here</a>
        <h4>4. Chính sách bảo mật thông tin khách hàng. </h4>
        <p class="p_inline_block">– Mời các bạn xem thêm tại đây:</p>
        <a href=""><i>Click here</i></a>
    </div>

    <div class="filter">
        <div class="danh_muc">
            <div class="head_danh_muc">
                <p>Danh mục tin tức</p>
                <i class="fas fa-caret-up"></i>
            </div>

            <div class="list_danh_muc">
                <a href="index.php?controller=news&action=index&id=1"><p>Tin tức </p></a>
                <a href="index.php?controller=news&action=index&id=2"><p>Nike blog</p></a>
                <a href="index.php?controller=news&action=index&id=3"><p>Gk blog</p></a>
                <a href="index.php?controller=news&action=index&id=1"><p>Adidas blog</p></a>
                <a href="index.php?controller=news&action=index&id=4"><p>Tin sales</p></a>
            </div>
        </div>

        <div class="danh_muc">
            <div class="head_danh_muc">
                <p>Bài viết mới nhất</p>
                <i class="fas fa-caret-up"></i>
            </div>

            <div class="list_bai_viet">
                <?php if (!empty($newsall)): ?>
                    <?php foreach ($newsall AS $news): ?>
                        <div class="img_text_list">
                            <div class="img_list">
                                <?php if (!empty($news['avatar'])): ?>
                                    <img src="../backend/assets/uploads/<?php echo $news['avatar'] ?>"/>
                                <?php endif; ?>
                            </div>

                            <div class="text_list">
                                <a href="index.php?controller=news&action=index&id=<?php echo $news['id']?>"><p><?php echo $news['name'] ?></p></a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>