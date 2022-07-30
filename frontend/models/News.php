<?php
require_once 'models/Model.php';
class News extends Model {


    public $id;
    public $category_id;
    public $title;
    public $name;
    public $summary;
    public $avatar;
    public $content;
    public $status;
    public $seo_title;
    public $seo_description;
    public $seo_keywords;
    public $created_at;
    public $updated_at;
    public $str_search = '';

    public function __construct()
    {
        parent::__construct();
        if (isset($_GET['title']) && !empty($_GET['title'])) {
            $this->str_search .= " AND products.title LIKE '%{$_GET['title']}%'";
        }
        if (isset($_GET['category_id']) && !empty($_GET['category_id'])) {
            $this->str_search .= " AND products.category_id = {$_GET['category_id']}";
        }
    }

    public function getById($id)
    {
        $obj_select = $this->connection
            ->prepare("SELECT * FROM news WHERE id = $id");
        $obj_select->execute();
        return $obj_select->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllList()
    {
        $sql_select_all = "SELECT * FROM news WHERE `status` = 1";
        $obj_select_all = $this->connection->prepare($sql_select_all);
        $obj_select_all->execute();
        $newsall = $obj_select_all->fetchAll(PDO::FETCH_ASSOC);
        return $newsall;
    }


    public function getAllPagination($arr_params)
    {
        $limit = $arr_params['limit'];
        $page = $arr_params['page'];
        $start = ($page - 1) * $limit;
        $obj_select = $this->connection
            ->prepare("SELECT news.*, categories.name AS category_name FROM news 
                        INNER JOIN categories ON categories.id = news.category_id
                        WHERE TRUE $this->str_search
                        ORDER BY news.updated_at DESC, news.created_at DESC
                        LIMIT $start, $limit
                        ");

        $arr_select = [];
        $obj_select->execute($arr_select);
        $news = $obj_select->fetchAll(PDO::FETCH_ASSOC);

        return $news;
    }


    public function countTotal()
    {
        $obj_select = $this->connection->prepare("SELECT COUNT(id) FROM news WHERE TRUE $this->str_search");
        $obj_select->execute();

        return $obj_select->fetchColumn();
    }


}

