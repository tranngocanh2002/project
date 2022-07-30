<div class="location">
    <a href="home.html"><p>Trang chủ  </p></a>
    <i class="fas fa-caret-right"></i>
    <a href="huong_dan_list_1.html"><p>Hướng dẫn thanh toán</p></a>
</div>

<div class="content">
    <div class="main_news">
        <h2>Hướng dẫn thanh toán</h2>
        <i>Hướng dẫn thanh toán </i>
        <p>Sau khi thống nhất đơn hàng với đại diện của soccerstore.vn , quý khách  có thể thanh toán bằng một trong các cách sau.</p>
        <h4>1. Thanh toán tiền mặt.</h4>
        <p>Trả tiền mặt chỉ áp dụng đối với  trường hợp quý khách đến tận nơi xem hàng hoặc những khu vực mà soccerstore.vn  hỗ trợ giao hàng miễn phí tận nơi, trong nội thành Hà Nội.</p>
        <h4>2. Thanh toán khi nhận hàng – CoD</h4>
        <p>– Áp dụng cho các đơn hàng theo hình thức giao hàng thu tiền.</p>
        <p>– Có thể không áp dụng cho các sản phẩm nằm trong chương trình sales khủng, sales nhanh, sales trong ngày…</p>
        <h4>3. Thanh toán chuyển tiền/ chuyển khoản ngân hàng.</h4>
        <p>Áp dụng cho khách hàng ngoài khu vực hỗ trợ giao nhận miễn phí và khách hàng có nhu cầu sử dụng phương thức thanh toán này. Các bước tiến hành như sau:</p>
        <p>Quý Khách đến Ngân hàng hoặc sử dụng các công cụ chuyển tiền/chuyển khoản mà ngân hàng của quý khách cung cấp.</p>
        <p>Tiến hành chuyển tiền theo thông tin chi tiết của đại diện soccerstore.vn  cung cấp bên dưới.</p>
        <p>Thông báo cho đại diện của soccerstore.vn (bằng điện thoại, email, SMS, …) khi quý khách đã thực hiện chuyển tiền, chuyển khoản thành công.</p>
        <p>Hoặc Quý khách vui lòng liên hệ với đại diện của soccerstore.vn theo đường dây nóng Mr Đức : 078.246.5555 hoặc Mr Kiên: 0923.833.666 để thông báo đã chuyển tiền.</p>
        <p>Ngay khi nhận được báo “Có” từ Ngân hàng,  đại diện của soccerstore.vn sẽ tiến hành xác nhận với quý khách và xuất hàng giao hàng cho quý khách trong thời gian quy định.</p>
        <p>Mọi chi phí chuyển khoản ngân hàng do quý khách chịu, thông thường là 3 300 VND cho chuyển khoản trong hệ thống ngân hàng, 11 000 VND cho chuyển khoản ngoài hệ thống ngân hàng.</p>
        <p>Thời gian xác nhận giao dịch chuyển khoản phụ thuộc vào ngân hàng quý khách khách sử dụng, có thể ngay lập tức hoặc 0.5-2 ngày, đại diện của soccerstore.vn sẽ thông báo thời gian dự kiến trước khi quý khách thực hiện chuyển tiền.</p>
        <p>Soccerstore.vn sẽ không chịu trách nhiệm về sai sót trong quá trình chuyển khoản hoặc chuyển khoản sai thông tin, quý khách phải làm việc với ngân hàng để được xử lý, chỉ khi nào tiền được chuyển đến tài khoản đại diện soccerstore.vn thì việc thanh toán cho đơn hàng mới hoàn tất.</p>
        <p>Với mỗi đơn hàng, quý khách ghi chú thông tin chuyển khoản như sau : [ tên người chuyển] [ ” Thanh toán cho”] [ sản phẩm quý khách muốn mua ]</p>
        <p>Thông tin các tài khoản đại diện của soccerstore.vn như sau:</p>
        <p>1.</p>
        <p>Ngân hàng Vietcombank,</p>
        <p>số tk: 0011004017742</p>
        <p>Chi nhánh : Sở giao dịch.</p>
        <p>Chu tk: Phùng Tiến Đức</p>




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