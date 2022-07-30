<?php
require_once 'controllers/Controller.php';
require_once 'models/Product.php';
require_once 'models/News.php';
require_once 'helpers/Helper.php';
require_once 'models/Category.php';


class HomeController extends Controller {
    public function index() {
        $category_model = new Category();
        $categories = $category_model->getAll();
        $news_model = new News();
        $newsall = $news_model->getAllList();

        $product_model = new Product();
        $products = $product_model->getProductInHomePage();

        $this->content = $this->render('views/homes/index.php', [
            'products' => $products,
            'newsall' => $newsall,
        ]);
        require_once 'views/layouts/main.php';
    }
}