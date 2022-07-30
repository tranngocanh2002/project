<?php
require_once 'controllers/Controller.php';
require_once 'models/User.php';
require_once 'models/Order.php';
require_once 'models/Order_detail.php';
require_once 'models/Pagination.php';
class Order_detailsController extends Controller {
    public function index() {
        $order_model = new Order();
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $total = $order_model->getTotal();
        $query_additional = '';
        if (isset($_GET['username'])) {
            $query_additional .= "&username=" . $_GET['username'];
        }
        $params = [
            'total' => $total,
            'limit' => 5,
            'query_string' => 'page',
            'controller' => 'order',
            'action' => 'index',
            'page' => $page,
            'query_additional' => $query_additional
        ];
        $pagination = new Pagination($params);
        $pages = $pagination->getPagination();
        $orders = $order_model->getAllPagination($params);

        $this->content = $this->render('views/orders/index.php', [
            'orders' => $orders,
            'pages' => $pages,
        ]);

        require_once 'views/layouts/main.php';
    }

    public function create() {
        $order_model = new Order();
        if (isset($_POST['submit'])) {
            $product_name = $_POST['product_name'];
            $product_price = $_POST['product_price'];
            $quantity = $_POST['quantity'];

            //xử lý validate
            if (empty($product_name)) {
                $this->error = 'Product_name không được để trống';
            } else if (empty($product_price)) {
                $this->error = 'Price không được để trống';
            } else if (empty($quantity)) {
                $this->error = 'Quantity confirm không được để trống';
            } else if (!empty($product_name)) {
                //kiếm tra xem username đã tồn tại trong DB hay chưa, nếu tồn tại sẽ báo lỗi
                $count_order = $order_model->getUserByUsername($product_name);
                if ($count_order) {
                    $this->error = 'Product_name này đã tồn tại trong CSDL';
                }
            }

            if (empty($this->error)) {

                $order_model->product_name = $product_name;
                $order_model->product_price = $product_price;
                $order_model->quantity = $quantity;
                $is_insert = $order_model->insert();
                if ($is_insert) {
                    $_SESSION['success'] = 'Insert dữ liệu thành công';
                } else {
                    $_SESSION['error'] = 'Insert dữ liệu thất bại';
                }
                header('Location: index.php?controller=order');
                exit();
            }
        }

        $this->content = $this->render('views/orders/create.php');

        require_once 'views/layouts/main.php';
    }


    public function update() {
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            header("Location: index.php?controller=user");
            exit();
        }

        $id = $_GET['id'];
        $user_model = new User();
        $user = $user_model->getById($id);
        if (isset($_POST['submit'])) {

            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $address = $_POST['address'];
            $jobs = $_POST['jobs'];
            $facebook = $_POST['facebook'];
            $status = $_POST['status'];
            if (!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $this->error = 'Email không đúng định dạng';
            } else if (!empty($facebook) && !filter_var($facebook, FILTER_VALIDATE_URL)) {
                $this->error = 'Link facebook không đúng định dạng url';
            } else if ($_FILES['avatar']['error'] == 0) {
                $extension = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
                $extension = strtolower($extension);
                $allow_extensions = ['png', 'jpg', 'jpeg', 'gif'];
                $file_size_mb = $_FILES['avatar']['size'] / 1024 / 1024;
                $file_size_mb = round($file_size_mb, 2);
                if (!in_array($extension, $allow_extensions)) {
                    $this->error = 'Phải upload avatar dạng ảnh';
                } else if ($file_size_mb > 2) {
                    $this->error = 'File upload không được lớn hơn 2Mb';
                }
            }
            if (empty($this->error)) {
                $filename = $user['avatar'];
                //xử lý upload ảnh nếu có
                if ($_FILES['avatar']['error'] == 0) {
                    $dir_uploads = 'assets/uploads';
                    //xóa file ảnh đã update trc đó
                    @unlink($dir_uploads . '/' . $filename);
                    if (!file_exists($dir_uploads)) {
                        mkdir($dir_uploads);
                    }

                    $filename = time() . '-user-' . $_FILES['avatar']['name'];
                    move_uploaded_file($_FILES['avatar']['tmp_name'], $dir_uploads . '/' . $filename);
                }
                $user_model->first_name = $first_name;
                $user_model->last_name = $last_name;
                $user_model->phone = $phone;
                $user_model->address = $address;
                $user_model->email = $email;
                $user_model->avatar = $filename;
                $user_model->jobs = $jobs;
                $user_model->facebook = $facebook;
                $user_model->status = $status;
                $is_update = $user_model->update($id);
                if ($is_update) {
                    $_SESSION['success'] = 'Update dữ liệu thành công';
                } else {
                    $_SESSION['error'] = 'Update dữ liệu thất bại';
                }
                header('Location: index.php?controller=user');
                exit();
            }
        }

        $this->content = $this->render('views/users/update.php', [
            'user' => $user
        ]);

        require_once 'views/layouts/main.php';
    }

    public function delete() {
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            $_SESSION['error'] = 'ID không hợp lệ';
            header('Location: index.php?controller=order_details');
            exit();
        }

        $id = $_GET['id'];
        $order_detail_model = new Order_detail();
        $is_delete = $order_detail_model->delete($id);
        if ($is_delete) {
            $_SESSION['success'] = 'Xóa dữ liệu thành công';
        } else {
            $_SESSION['error'] = 'Xóa dữ liệu thất bại';
        }
        header('Location: index.php?controller=order_details');
        exit();
    }

    public function detail() {


        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            header("Location: index.php?controller=order_details");
            exit();
        }
        $id = $_GET['id'];
        $order_model = new Order_detail();
        $order_details = $order_model->getById($id);

        $this->content = $this->render('views/order_details/detail.php', [
            'order_details' => $order_details
        ]);

        require_once 'views/layouts/main.php';
    }


}