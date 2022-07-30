
<div class="content">
    <div class="show_pro">
        <div class="img_show_pro">
            <img src="../backend/assets/uploads/<?php echo $product['avatar'] ?>" alt="">
        </div>

        <form action="" class="add_cart" method="post">
            <div class="text_show_pro">
                <div class="name_pro">
                    <h3><?php echo $product['title']; ?></h3>
                    <br>
                    <p>Mã sản phẩm: </p>
                    <span><?php echo $product['title']; ?></span>
                </div>

                <hr>

                <div class="money_pro">
                    <div class="money">
                        <h2><?php echo number_format($product['price'], 0, '.', ','); ?>₫</h2>
                    </div>

                    <div class="type">
                        <div class="type_2">
                            <p>Bộ sưu tập:</p>
                            <a href=""><?php echo $product['summary'];?></a>
                        </div>
                    </div>
                </div>

                <hr>

                <div class="note_pro">
                    <p><?php echo $product['content'];?></p>
                </div>

                <hr>

<!--                <div class="size_many">-->
<!--                    <p>Chọn size</p>-->
<!--                    <div class="text_size">-->
<!--                        <label>-->
<!--                            <input type="radio" value="39" name="size">-->
<!--                            <p>39</p>-->
<!--                        </label>-->
<!--                        <label>-->
<!--                            <input type="radio" value="40" name="size">-->
<!--                            <p>40</p>-->
<!--                        </label>-->
<!--                        <label>-->
<!--                            <input type="radio" value="41" name="size">-->
<!--                            <p>41</p>-->
<!--                        </label>-->
<!--                        <label>-->
<!--                            <input type="radio" value="41" name="size">-->
<!--                            <p>42</p>-->
<!--                        </label>-->
<!--                        <label>-->
<!--                            <input type="radio" value="41" name="size">-->
<!--                            <p>43</p>-->
<!--                        </label>-->
<!--                        <label>-->
<!--                            <input type="radio" value="41" name="size">-->
<!--                            <p>44</p>-->
<!--                        </label>-->
<!--                    </div>-->
<!---->
<!--                    <div class="how_many">-->
<!--                        <span>Số lượng</span>-->
<!--                        <input type="number" value="1" min="0" class="form_sl">-->
<!--                    </div>-->
<!--                </div>-->

                <div class="support">
                    <div class="padding_phone">
                        <p>Hỗ trợ đặt hàng</p>
                        <div class="phone">
                            <div class="img_phone">
                                <img src="assets/imagers/img_phone.png" alt="">
                            </div>
                            <div class="sdt_phone">
                                <a href="">Putin: 078.246.5555</a>
                                <a href="">Steven Kiên: 0923.833.666</a>
                            </div>
                        </div>
                    </div>

                    <div class="zalo">
                        <div class="phone">
                            <div class="img_phone">
                                <img src="assets/imagers/img_zalo.png" alt="">
                            </div>
                            <div class="sdt_phone">
                                <a href="">Putin: 078.246.5555</a>
                                <a href="">Steven Kiên: 0923.833.666</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="order">
                    <a href="gio-hang-cua-ban.html">
                        <div data-id="<?php echo $product['id']; ?>" class="add-to-cart">
                            <i class="fa fa-cart-plus"></i> Đặt hàng
                        </div>
                    </a>
                </div>

            </div>
        </form>
    </div>
</div>