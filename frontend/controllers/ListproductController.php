<?php
require_once 'controllers/Controller.php';
require_once 'models/Product.php';
require_once 'models/Category.php';
require_once 'models/News.php';
require_once 'models/Pagination.php';
require_once 'models/Listproduct.php';
class ListproductController extends Controller {
    public function index()
    {
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            $_SESSION['error'] = 'ID ko hợp lệ';
            header("Location: index.php?controller=product&action=index");
            exit();
        }

        $category_model = new Category();
        $categories = $category_model->getAll();
        $news_model = new News();
        $newsall = $news_model->getAllList();

        $id = $_GET['id'];
        $product_model = new Listproduct();
        $products = $product_model->getById($id);

        $this->content = $this->render('views/listproducts/index.php', [
            'products' => $products,
            'newsall' => $newsall,
        ]);
        require_once 'views/layouts/main.php';


    }

}