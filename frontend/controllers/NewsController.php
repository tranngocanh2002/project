<?php
require_once 'controllers/Controller.php';
require_once 'models/Product.php';
require_once 'models/News.php';
require_once 'models/Category.php';
require_once 'models/Pagination.php';
class NewsController extends Controller {


    public function index() {
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            header("Location: index.php?controller=news");
            exit();
        }
        $news_model = new News();
        $newsall = $news_model->getAllList();
        $category_model = new Category();
        $categories = $category_model->getAll();

        $id = $_GET['id'];
        $news_model = new News();
        $news = $news_model->getById($id);

        $this->content = $this->render('views/news/index.php', [
            'news' => $news,
            'newsall' => $newsall,
        ]);

        require_once 'views/layouts/main.php';
    }
}