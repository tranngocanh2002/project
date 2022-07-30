<?php
require_once 'controllers/Controller.php';
require_once 'models/User.php';
require_once 'models/Order.php';
require_once 'models/Pagination.php';
class OrderController extends Controller {
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
            $fullname = $_POST['fullname'];
            $address = $_POST['address'];
            $mobile = $_POST['mobile'];
            $email = $_POST['email'];
            $note = $_POST['note'];
            $price_total = $_POST['price_total'];
            $payment_status = $_POST['payment_status'];

            if (empty($fullname)) {
                $this->error = 'Fullname không được để trống';
            } else if (empty($address)) {
                $this->error = 'Address không được để trống';
            } else if (empty($mobile)) {
                $this->error = 'Mobile confirm không được để trống';
            } else if (empty($email)) {
                $this->error = 'Email confirm không được để trống';
            } else if (empty($payment_status)) {
                $this->error = 'Payment_status confirm không được để trống';
            } else if (!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $this->error = 'Email không đúng định dạng';
            }

            if (empty($this->error)) {

                $order_model->fullname = $fullname;
                $order_model->address = $address;
                $order_model->mobile = $mobile;
                $order_model->email = $email;
                $order_model->note = $note;
                $order_model->payment_status = $payment_status;
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
            header("Location: index.php?controller=order");
            exit();
        }

        $id = $_GET['id'];
        $order_model = new Order();
        $order = $order_model->getById($id);
        if (isset($_POST['submit'])) {

            $fullname = $_POST['fullname'];
            $address = $_POST['address'];
            $mobile = $_POST['mobile'];
            $email = $_POST['email'];
            $note = $_POST['note'];
            $payment_status = $_POST['payment_status'];
            if (empty($fullname)) {
                $this->error = 'Fullname không được để trống';
            } else if (empty($address)) {
                $this->error = 'Address không được để trống';
            } else if (empty($mobile)) {
                $this->error = 'Mobile confirm không được để trống';
            } else if (empty($email)) {
                $this->error = 'Email confirm không được để trống';
            } else if (!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $this->error = 'Email không đúng định dạng';
            }

            if (empty($this->error)) {

                $order_model->fullname = $fullname;
                $order_model->address = $address;
                $order_model->mobile = $mobile;
                $order_model->email = $email;
                $order_model->note = $note;
                $order_model->payment_status = $payment_status;
                $is_update = $order_model->update($id);
                if ($is_update) {
                    $_SESSION['success'] = 'Update dữ liệu thành công';
                } else {
                    $_SESSION['error'] = 'Update dữ liệu thất bại';
                }
                header('Location: index.php?controller=order');
                exit();
            }


        }

        $this->content = $this->render('views/orders/update.php', [
            'order' => $order
        ]);

        require_once 'views/layouts/main.php';
    }

    public function delete() {
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            $_SESSION['error'] = 'ID không hợp lệ';
            header('Location: index.php?controller=order');
            exit();
        }

        $id = $_GET['id'];
        $user_model = new Order();
        $is_delete = $user_model->delete($id);
        if ($is_delete) {
            $_SESSION['success'] = 'Xóa dữ liệu thành công';
        } else {
            $_SESSION['error'] = 'Xóa dữ liệu thất bại';
        }
        header('Location: index.php?controller=order');
        exit();
    }

    public function detail() {
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            header("Location: index.php?controller=order");
            exit();
        }
        $id = $_GET['id'];
        $order_model = new Order();
        $oder = $order_model->getById($id);

        $this->content = $this->render('views/orders/detail.php', [
            'oder' => $oder
        ]);

        require_once 'views/layouts/main.php';
    }

    public function logout() {
        $_SESSION = [];
        session_destroy();
        $_SESSION['success'] = 'Logout thành công';
        header('Location: index.php?controller=login&action=login');
        exit();
    }
}