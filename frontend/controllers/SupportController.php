<?php
require_once 'controllers/Controller.php';
require_once 'models/Category.php';
require_once 'models/News.php';
require_once 'models/Pagination.php';
class SupportController extends Controller {
    public function order() {
        $news_model = new News();
        $newsall = $news_model->getAllList();
        $category_model = new Category();
        $categories = $category_model->getAll();
        $this->content = $this->render('views/supports/order.php', [
            'newsall' => $newsall,
        ]);
        require_once 'views/layouts/main.php';
    }
    public function pay() {
        $news_model = new News();
        $newsall = $news_model->getAllList();
        $category_model = new Category();
        $categories = $category_model->getAll();
        $this->content = $this->render('views/supports/pay.php', [
            'newsall' => $newsall,
        ]);
        require_once 'views/layouts/main.php';
    }
    public function policy() {
        $news_model = new News();
        $newsall = $news_model->getAllList();
        $category_model = new Category();
        $categories = $category_model->getAll();
        $this->content = $this->render('views/supports/policy.php', [
            'newsall' => $newsall,
        ]);
        require_once 'views/layouts/main.php';
    }
    public function question() {
        $news_model = new News();
        $newsall = $news_model->getAllList();
        $category_model = new Category();
        $categories = $category_model->getAll();
        $this->content = $this->render('views/supports/question.php', [
            'newsall' => $newsall,
        ]);
        require_once 'views/layouts/main.php';
    }
    public function introduce() {
        $news_model = new News();
        $newsall = $news_model->getAllList();
        $category_model = new Category();
        $categories = $category_model->getAll();
        $this->content = $this->render('views/supports/introduce.php', [
            'newsall' => $newsall,
        ]);
        require_once 'views/layouts/main.php';
    }
}