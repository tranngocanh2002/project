<?php
require_once 'helpers/Helper.php';
?>
<div class="container_payments">
    <h1>Thanh toán</h1>
    <form action="" method="POST">
        <div class="row">
            <div class="col-md-6 col-sm-6">
                <h3 class="center-align">Thông tin khách hàng</h3>
                <div class="form-group">
                    <label>Họ tên khách hàng</label>
                    <input type="text" name="fullname" value="" class="form-control" placeholder="">
                </div>
                <div class="form-group">
                    <label>Địa chỉ</label>
                    <input type="text" name="address" value="" class="form-control" placeholder="">
                </div>
                <div class="form-group">
                    <label>SĐT</label>
                    <input type="number" min="0" name="mobile" value="" class="form-control" placeholder="">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" min="0" name="email" value="" class="form-control" placeholder="">
                </div>
                <div class="form-group">
                    <label>Ghi chú thêm</label>
                    <textarea name="note" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label>Chọn phương thức thanh toán</label> <br />
                    <input type="radio" name="method" value="0" /> Thanh toán trực tuyến <br />
                    <input type="radio" name="method" checked value="1" /> COD (dựa vào địa chỉ của bạn) <br />
                </div>
            </div>
            <div class="col-md-6 col-sm-6">
                <h3 class="center-align">Thông tin đơn hàng của bạn</h3>
              <?php
              //biến lưu tổng giá trị đơn hàng
              $total = 0;
              if (isset($_SESSION['cart'])):
                ?>
                  <table class="table_product" border="1" cellspacing="0" cellpadding="16">
                      <tbody>
                      <tr>
                          <th width="40%">Tên sản phẩm</th>
                          <th width="12%">Số lượng</th>
                          <th>Giá</th>
                          <th>Thành tiền</th>
                      </tr>
                      <?php foreach ($_SESSION['cart'] AS $product_id => $cart):
                        $product_link = 'san-pham/' . Helper::getSlug($cart['name']) . "/$product_id";
                        ?>
                          <tr>
                              <td>
                                <?php if (!empty($cart['avatar'])): ?>
                                    <img class="product-avatar img-responsive"
                                         src="../backend/assets/uploads/<?php echo $cart['avatar']; ?>" width="60"/>
                                <?php endif; ?>
                                  <div class="content-product">
                                      <a href="<?php echo $product_link; ?>" class="content-product-a">
                                        <?php echo $cart['name']; ?>
                                      </a>
                                  </div>
                              </td>
                              <td>
                              <span class="product-amount">
                                  <?php echo $cart['quantity']; ?>
                              </span>
                              </td>
                              <td>
                              <span class="product-price-payment">
                                 <?php echo number_format($cart['price'], 0, '.', '.') ?> vnđ
                              </span>
                              </td>
                              <td>
                              <span class="product-price-payment">
                                  <?php
                                  $price_total = $cart['price'] * $cart['quantity'];
                                  $total += $price_total;
                                  ?>
                                <?php echo number_format($price_total, 0, '.', '.') ?> vnđ
                              </span>
                              </td>
                          </tr>
                      <?php endforeach; ?>
                      <tr>
                          <td colspan="5" class="product-total">
                              Tổng giá trị đơn hàng:
                              <span class="product-price">
                                <?php echo number_format($total, 0, '.', '.') ?> vnđ
                            </span>
                          </td>
                      </tr>
                      </tbody>
                  </table>
              <?php endif; ?>

            </div>
        </div>
        <input type="submit" name="submit" value="Thanh toán" class="pay">
        <a href="gio-hang-cua-ban.html" class="return_cart">Về trang giỏ hàng</a>
    </form>
</div>