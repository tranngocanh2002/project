<div class="location">
    <a href="home.html"><p>Trang chủ  </p></a>
    <i class="fas fa-caret-right"></i>
    <a href="index.php?controller=news&action=index&id=1"><p>Adidas blog</p></a>
</div>

<div class="content">

    <div class="main_news">
        <?php if (!empty($news)): ?>
        <?php foreach ($news AS $news): ?>
        <div class="name_news">
            <h2><?php echo $news['name'] ?></h2>
        </div>
        <div class="summary-news">
<!--            <span>--><?php //echo $news['title'] ?><!--</span>-->
            <p><?php echo $news['summary'] ?></p>
        </div>
        <div class="img_news">
            <?php if (!empty($news['avatar'])): ?>
                <img src="../backend/assets/uploads/<?php echo $news['avatar'] ?>"/>
            <?php endif; ?>
        </div>

        <div class="text_news">
            <p><?php echo $news['content'] ?></p>
        </div>
        <?php endforeach; ?>
        <?php endif; ?>


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
