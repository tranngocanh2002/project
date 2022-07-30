<h2>Cập nhật order</h2>
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="fullname">Fullname <span class="red">*</span></label>
        <input type="text" name="fullname" id="fullname"
               value="<?php echo isset($_POST['fullname']) ? $_POST['fullname'] : '' ?>" class="form-control"/>
    </div>
    <div class="form-group">
        <label for="address">address <span class="red">*</span></label>
        <input type="text" name="address" id="address"
               value="<?php echo isset($_POST['address']) ? $_POST['address'] : '' ?>" class="form-control"/>
    </div>
    <div class="form-group">
        <label for="mobile">mobile <span class="red">*</span></label>
        <input type="number" name="mobile" id="mobile"
               value="<?php echo isset($_POST['mobile']) ? $_POST['mobile'] : '' ?>" class="form-control"/>
    </div>
    <div class="form-group">
        <label for="email">email <span class="red">*</span></label>
        <input type="email" name="email" id="email"
               value="<?php echo isset($_POST['email']) ? $_POST['email'] : '' ?>" class="form-control"/>
    </div>
    <div class="form-group">
        <label for="address">note <span class="red">*</span></label>
        <input type="text" name="note" id="note"
               value="<?php echo isset($_POST['note']) ? $_POST['note'] : '' ?>" class="form-control"/>
    </div>
    <div class="form-group">
        <label for="payment_status">Trạng thái</label>
        <select name="payment_status" class="form-control" id="payment_status">
            <?php
            $selected_active = '';
            $selected_disabled = '';
            if (isset($_POST['payment_status'])) {
                switch ($_POST['payment_status']) {
                    case 0:
                        $selected_disabled = 'selected';
                        break;
                    case 1:
                        $selected_active = 'selected';
                        break;
                }
            }
            ?>
            <option value="0" <?php echo $selected_disabled; ?>>Disabled</option>
            <option value="1" <?php echo $selected_active ?>>Active</option>
        </select>
    </div>
    <div class="form-group">
        <input type="submit" name="submit" value="Save" class="btn btn-primary"/>
        <a href="index.php?controller=order&action=index" class="btn btn-default">Back</a>
    </div>
</form>