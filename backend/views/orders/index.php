<!--<form method="GET" action="">-->
<!--    <div class="form-group">-->
<!--        <label for="username">Username</label>-->
<!--        <input type="text" name="username" id="username"-->
<!--               value="--><?php //echo isset($_GET['username']) ? $_GET['username'] : '' ?><!--" class="form-control"/>-->
<!--        <input type="hidden" name="controller" value="user"/>-->
<!--        <input type="hidden" name="action" value="index"/>-->
<!--    </div>-->
<!--    <div class="form-group">-->
<!--        <input type="submit" value="Tìm kiếm" name="search" class="btn btn-primary"/>-->
<!--        <a href="index.php?controller=user" class="btn btn-default">Back</a>-->
<!--    </div>-->
<!--</form>-->

<h2>Danh sách order</h2>
<!--<a href="index.php?controller=order&action=create" class="btn btn-success">-->
<!--    <i class="fa fa-plus"></i> Thêm mới-->
<!--</a>-->
<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <th>Fullname</th>
        <th>Address</th>
        <th>Mobile</th>
        <th>Email</th>
        <th>Note</th>
        <th>Price_total</th>
        <th>Payment_status</th>
        <th>Created_at</th>
        <th>Update_at</th>
        <th></th>
    </tr>
    <?php if (!empty($orders)): ?>
        <?php foreach ($orders as $order): ?>
            <tr>
                <td><?php echo $order['id'] ?></td>
                <td><?php echo $order['fullname'] ?></td>
                <td><?php echo $order['address'] ?></td>
                <td><?php echo $order['mobile'] ?></td>
                <td><?php echo $order['email'] ?></td>
                <td><?php echo $order['note'] ?></td>
                <td><?php echo $order['price_total'] ?></td>
                <td><?php echo $order['payment_status'] ?></td>
                <td><?php echo date('d-m-Y H:i:s', strtotime($order['created_at'])) ?></td>
                <td><?php echo date('d-m-Y H:i:s', strtotime($order['updated_at'])) ?></td>
                <td>
                    <?php
                    $url_detail = "index.php?controller=order_details&action=detail&id=" . $order['id'];
                    $url_update = "index.php?controller=order&action=update&id=" . $order['id'];
                    $url_delete = "index.php?controller=order&action=delete&id=" . $order['id'];
                    ?>
                    <a title="Chi tiết" href="<?php echo $url_detail ?>"><i class="fa fa-eye"></i></a> &nbsp;&nbsp;
                    <a title="Update" href="<?php echo $url_update ?>"><i class="fa fa-pencil-alt"></i></a> &nbsp;&nbsp;
                    <a title="Xóa" href="<?php echo $url_delete ?>" onclick="return confirm('Are you sure delete?')"><i
                                class="fa fa-trash"></i></a>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
    <?php endif; ?>
</table>
<?php echo $pages; ?>