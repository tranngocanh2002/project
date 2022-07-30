<?php
require_once 'helpers/Helper.php';
?>
<h2>Chi tiết order</h2>
<table class="table table-bordered">
    <tr>
        <th>Order_id</th>
        <th>Product_name</th>
        <th>Product_price</th>
        <th>Quantity</th>
    </tr>
    <?php if (!empty($order_details)): ?>
        <?php foreach ($order_details as $order_detail): ?>
            <tr>
                <td><?php echo $order_detail['order_id'] ?></td>
                <td><?php echo $order_detail['product_name'] ?></td>
                <td><?php echo $order_detail['product_price'] ?></td>
                <td><?php echo $order_detail['quantity'] ?></td>
                <td>
                    <?php
                    $url_delete = "index.php?controller=order_details&action=delete&id=" . $order_detail['id'];
                    ?>
                    <a title="Xóa" href="<?php echo $url_delete ?>" onclick="return confirm('Are you sure delete?')"><i
                                class="fa fa-trash"></i></a>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
    <?php endif; ?>
</table>
<a href="index.php?controller=order&action=index" class="btn btn-default">Back</a>