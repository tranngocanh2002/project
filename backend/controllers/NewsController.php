<?php
require_once 'controllers/Controller.php';
require_once 'models/Product.php';
require_once 'models/Category.php';
require_once 'models/News.php';
require_once 'models/Pagination.php';

class NewsController extends Controller
{
    public function index()
    {
        $news_model = new News();
        $count_total = $news_model->countTotal();
        $query_additional = '';
        if (isset($_GET['title'])) {
            $query_additional .= '&title=' . $_GET['title'];
        }
        if (isset($_GET['category_id'])) {
            $query_additional .= '&category_id=' . $_GET['category_id'];
        }
        $arr_params = [
            'total' => $count_total,
            'limit' => 10,
            'query_string' => 'page',
            'controller' => 'news',
            'action' => 'index',
            'full_mode' => false,
            'query_additional' => $query_additional,
            'page' => isset($_GET['page']) ? $_GET['page'] : 1
        ];
        $news = $news_model->getAllPagination($arr_params);
        $pagination = new Pagination($arr_params);

        $pages = $pagination->getPagination();
        $category_model = new Category();
        $categories = $category_model->getAll();

        $this->content = $this->render('views/news/index.php', [
            'news' => $news,
            'categories' => $categories,
            'pages' => $pages,
        ]);
        require_once 'views/layouts/main.php';
    }

    public function create()
    {
        if (isset($_POST['submit'])) {
            $category_id = $_POST['category_id'];
            $title = $_POST['title'];
            $name = $_POST['name'];
            $summary = $_POST['summary'];
            $content = $_POST['content'];
            $status = $_POST['status'];
            $seo_title = $_POST['seo_title'];
            $seo_description = $_POST['seo_description'];
            $seo_keywords = $_POST['seo_keywords'];
            if (empty($name)) {
                $this->error = 'Không được để trống name';
            } else if ($_FILES['avatar']['error'] == 0) {
                $extension = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
                $extension = strtolower($extension);
                $arr_extension = ['jpg', 'jpeg', 'png', 'gif'];

                $file_size_mb = $_FILES['avatar']['size'] / 1024 / 1024;
                $file_size_mb = round($file_size_mb, 2);

                if (!in_array($extension, $arr_extension)) {
                    $this->error = 'Cần upload file định dạng ảnh';
                } else if ($file_size_mb > 2) {
                    $this->error = 'File upload không được quá 2MB';
                }
            }

            if (empty($this->error)) {
                $filename = '';
                if ($_FILES['avatar']['error'] == 0) {
                    $dir_uploads = 'assets/uploads';
                    if (!file_exists($dir_uploads)) {
                        mkdir($dir_uploads);
                    }
                    $filename = time() . '-news-' . $_FILES['avatar']['name'];
                    move_uploaded_file($_FILES['avatar']['tmp_name'], $dir_uploads . '/' . $filename);
                }
                $news_model = new News();
                $news_model->category_id = $category_id;
                $news_model->title = $title;
                $news_model->name = $name;
                $news_model->summary = $summary;
                $news_model->avatar = $filename;
                $news_model->content = $content;
                $news_model->status = $status;
                $news_model->seo_title = $seo_title;
                $news_model->seo_description = $seo_description;
                $news_model->seo_keywords = $seo_keywords;
                $is_insert = $news_model->insert();
                if ($is_insert) {
                    $_SESSION['success'] = 'Insert dữ liệu thành công';
                } else {
                    $_SESSION['error'] = 'Insert dữ liệu thất bại';
                }
                header('Location: index.php?controller=news');
                exit();
            }
        }

        $category_model = new Category();
        $categories = $category_model->getAll();

        $this->content = $this->render('views/news/create.php', [
            'categories' => $categories
        ]);
        require_once 'views/layouts/main.php';
    }

    public function detail()
    {
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            $_SESSION['error'] = 'ID không hợp lệ';
            header('Location: index.php?controller=news');
            exit();
        }

        $id = $_GET['id'];
        $news_model = new News();
        $news = $news_model->getById($id);

        $this->content = $this->render('views/news/detail.php', [
            'news' => $news
        ]);
        require_once 'views/layouts/main.php';
    }

    public function update()
    {
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            $_SESSION['error'] = 'ID không hợp lệ';
            header('Location: index.php?controller=news');
            exit();
        }

        $id = $_GET['id'];
        $news_model = new News();
        $news = $news_model->getById($id);
        //xử lý submit form
        if (isset($_POST['submit'])) {
            $category_id = $_POST['category_id'];
            $name = $_POST['name'];
            $summary = $_POST['summary'];
            $content = $_POST['content'];
            $status = $_POST['status'];
            $seo_title = $_POST['seo_title'];
            $seo_description = $_POST['seo_description'];
            $seo_keywords = $_POST['seo_keywords'];
            $title = $_POST['title'];
            //xử lý validate
            if (empty($name)) {
                $this->error = 'Không được để trống name';
            } else if ($_FILES['avatar']['error'] == 0) {
                $extension = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
                $extension = strtolower($extension);
                $arr_extension = ['jpg', 'jpeg', 'png', 'gif'];

                $file_size_mb = $_FILES['avatar']['size'] / 1024 / 1024;
                $file_size_mb = round($file_size_mb, 2);

                if (!in_array($extension, $arr_extension)) {
                    $this->error = 'Cần upload file định dạng ảnh';
                } else if ($file_size_mb > 2) {
                    $this->error = 'File upload không được quá 2MB';
                }
            }

            if (empty($this->error)) {
                $filename = $news['avatar'];
                //xử lý upload file nếu có
                if ($_FILES['avatar']['error'] == 0) {
                    $dir_uploads = 'assets/uploads';
                    @unlink($dir_uploads . '/' . $filename);
                    if (!file_exists($dir_uploads)) {
                        mkdir($dir_uploads);
                    }
                    $filename = time() . '-news-' . $_FILES['avatar']['name'];
                    move_uploaded_file($_FILES['avatar']['tmp_name'], $dir_uploads . '/' . $filename);
                }
                $news_model->category_id = $category_id;
                $news_model->name = $name;
                $news_model->summary = $summary;
                $news_model->avatar = $filename;
                $news_model->content = $content;
                $news_model->status = $status;
                $news_model->seo_title = $seo_title;
                $news_model->seo_description = $seo_description;
                $news_model->seo_keywords = $seo_keywords;
                $news_model->updated_at = date('Y-m-d H:i:s');
                $news_model->title = $title;

                $is_update = $news_model->update($id);
                if ($is_update) {
                    $_SESSION['success'] = 'Update dữ liệu thành công';
                } else {
                    $_SESSION['error'] = 'Update dữ liệu thất bại';
                }
                header('Location: index.php?controller=news');
                exit();
            }
        }

        $category_model = new Category();
        $categories = $category_model->getAll();

        $this->content = $this->render('views/news/update.php', [
            'categories' => $categories,
            'news' => $news,
        ]);
        require_once 'views/layouts/main.php';
    }

    public function delete()
    {
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            $_SESSION['error'] = 'ID không hợp lệ';
            header('Location: index.php?controller=news');
            exit();
        }

        $id = $_GET['id'];
        $news_model = new News();
        $is_delete = $news_model->delete($id);
        if ($is_delete) {
            $_SESSION['success'] = 'Xóa dữ liệu thành công';
        } else {
            $_SESSION['error'] = 'Xóa dữ liệu thất bại';
        }
        header('Location: index.php?controller=news');
        exit();
    }
}