<div class="location">
    <a href="home.html"><p>Trang chủ  </p></a>
    <i class="fas fa-caret-right"></i>
    <a href="san_pham.html"><p>Hướng dẫn đặt hàng</p></a>
</div>
<div class="content">
    <div class="main_news">
        <div class="text1">
            <h2>Hướng dẫn đặt hàng</h2>
            <i>Hướng dẫn đặt hàng/ soccerstore.vn- Giày bóng đá chính hãng Nike & Adidas</i>
            <span>1. Liên hệ trực tiếp với người đại diện của soccerstore.vn theo các phương thức:</span>
            <table border="1" cellspacing="0" cellpadding="16">
                <tr>
                    <td>Phương thức liên hệ</td>
                    <td>Putin</td>
                    <td>Mr Kiên</td>
                </tr>

                <tr>
                    <td>Điện thoại</td>
                    <td>078.246.5555</td>
                    <td>0923.833.666</td>
                </tr>

                <tr>
                    <td>Email</td>
                    <td>sales@soccerstore.vn</td>
                    <td>thaonv@soccerstore.vn</td>
                </tr>

                <tr>
                    <td>Zalo</td>
                    <td>078.246.55555</td>
                    <td>0923.833.666</td>
                </tr>

                <tr>
                    <td>Yahoo</td>
                    <td></td>
                    <td></td>
                </tr>

                <tr>
                    <td>Facebook</td>
                    <td>https://www.facebook.com                </td>
                    <td></td>
                </tr>
            </table>
            <p>Địa chỉ:</p>
            <p>Store 1: Số 2 ngõ 121 Thái Hà, quận Đống Đa, Hà Nội</p>
            <p>Store 2: số 129 Nguyễn Viết Xuân, quận Hà Đông, Hà Nội</p>
        </div>

        <div class="text2">
            <p>2. Liên hệ qua facebook page: </p>
            <span>Facebook spanage chính thức của socccerstore.vn tại : </span>
            <a href="https://www.facebook.com/soccerstore.vn">https://www.facebook.com</a>
        </div>

        <div class="text3">
            <p>3. Đặt hàng trên website.</p>
            <span>– Truy cập www.soccerstore.vn</span>
            <span>– Chọn sản phẩm muốn đặt theo các hướng dẫn sau.</span>
            <span>1) Kiểm tra tình trạng sản phẩm.</span>
            <span>2) Chọn kích size sản phẩm.</span>
            <span>3) Click vào nút ” Thêm vào giỏ hàng ”</span>
            <span>4) Nhập các thông tin liên hệ.</span>
            <span>5) Click vào nút ” Gửi đơn hàng ”</span>
            <span>6) Gửi thông tin liên hệ theo các cách.</span>
            <span>– Click vào mục” Liên hệ ” và gửi các thông tin đầy đủ như : sản phẩm quan tâm, số điện thoại liên hệ.</span>
            <span>– Click pop up phía dưới trang, gửi các thông tin liên hệ đầy đủ như : sản phẩm quan tâm, số điện thoại liên hệ.</span>
            <span>– Click vào mục online support, sử dung Zalo hoặc skype để chat với người phụ trách.</span>
        </div>
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