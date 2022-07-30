<?php
require_once 'controllers/Controller.php';
require_once 'models/Product.php';
require_once 'models/News.php';
require_once 'models/Category.php';


class CartController extends Controller
{
    public function add() {
        $product_id = $_GET['product_id'];
        // Lấy thông tin sản phẩm theo id
        $product_model = new Product();
        $product = $product_model->getById($product_id);

        $cart_item = [
            'name'=> $product['title'],
            'avatar'=> $product['avatar'],
            'price' => $product['price'],
            'quantity' => 1// mặc định mỗi lần thêm sp vào giỏ
        ];

        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'][$product_id] = $cart_item;
        } else {
            if (isset($_SESSION['cart'][$product_id])) {
                $_SESSION['cart'][$product_id]['quantity']++;
            }else {
                $_SESSION['cart'][$product_id] = $cart_item;
            }
        }
        echo '<pre>';
        print_r($_SESSION['cart']);
        echo '<pre>';
    }

    public function index() {

        $news_model = new News();
        $newsall = $news_model->getAllList();
        $category_model = new Category();
        $categories = $category_model->getAll();
        if (isset($_POST['submit'])) {
            // - Cập nhật giỏ hàng theo số lượng gửi lên từ form
            foreach ($_SESSION['cart'] as $product_id => $cart_item) {
                // - Nếu số lượnh=g là số âm thì ko cập nhật
                if ($_POST[$product_id]<0) {
                    $_SESSION['error'] = 'số lượng phải nhỏ hơn 0';
                    header('location: gio-hang-cua-ban.html');
                    exit();
                }
                $_SESSION['cart'][$product_id]['quantity'] = $_POST[$product_id];
            }
            $_SESSION['succses'] = "Cập nhật giỏ hàng thành công";
        }


        $this->page_title='Trang giỏ hàng của bạn';
        $this->content = $this->render('views/carts/index.php',[
            'newsall' => $newsall,
        ]);
        require_once 'views/layouts/main.php';
    }

    public function delete() {
        echo '<pre>';
        print_r($_GET);
        echo '<pre>';
        $product_id = $_GET['id'];
        unset($_SESSION['cart'][$product_id]);
        $_SESSION['succses'] = 'Xóa sp khỏi giỏ hàng thành công';
        header('Location:gio-hang-cua-ban.html');
        exit();
    }
}