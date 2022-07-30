<?php
require_once 'controllers/Controller.php';
require_once 'models/Order.php';
require_once 'models/OrderDetail.php';
require_once 'libraries/PHPMailer/src/PHPMailer.php';
require_once 'libraries/PHPMailer/src/SMTP.php';
require_once 'libraries/PHPMailer/src/Exception.php';
require_once 'models/Category.php';
require_once 'models/News.php';


class PaymentController extends Controller
{
    public function index()
    {
        $news_model = new News();
        $newsall = $news_model->getAllList();
        $category_model = new Category();
        $categories = $category_model->getAll();

        if (isset($_POST['submit'])) {
            $fullname = $_POST['fullname'];
            $address = $_POST['address'];
            $mobile = $_POST['mobile'];
            $email = $_POST['email'];
            $note = $_POST['note'];
            $method = $_POST['method'];

            $payment_status = 0;

            $price_total = 0;

            foreach ($_SESSION['cart'] as $cart_item) {
                $price_total +=
                    $cart_item['price'] * $cart_item['quantity'];
            }
            $order_model = new Order();
            $order_id = $order_model->insertData($fullname,$address,$mobile,$email,$note,$price_total);

            foreach ($_SESSION['cart'] AS $cart_item) {
                $order_detail_model = new OrderDetail();
                $infos = [
                    'order_id' => $order_id,
                    'product_name' => $cart_item['name'],
                    'product_price' => $cart_item['price'],
                    'quantity' => $cart_item['quantity'],
                ];
                $is_insert = $order_detail_model->insertData($infos);
            }


            unset($_SESSION['cart']);

            if ($method == 0) {

            } else {

            }
        }

        $this->page_title = 'Trang thanh toán';
        $this->content =
            $this->render('views/payments/index.php',[
                'newsall' => $newsall,
            ]);
        require_once 'views/layouts/main.php';
    }
}