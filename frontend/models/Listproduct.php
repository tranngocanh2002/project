<?php
require_once 'models/Model.php';
class Listproduct extends Model {



    public function getById($id)
    {
        $obj_select = $this->connection
            ->prepare("SELECT products.*, categories.name AS category_name FROM products 
                        INNER JOIN categories ON categories.id = products.category_id
                        WHERE categories.id = $id
                        ORDER BY products.created_at DESC
                        ");

        $arr_select = [];
        $obj_select->execute($arr_select);
        $categories = $obj_select->fetchAll(PDO::FETCH_ASSOC);

        return $categories;
    }




    public function getProductInHome($params = []) {
        $str_filter = '';
        if (isset($params['category'])) {
            $str_category = $params['category'];
            $str_filter .= " AND categories.id IN $str_category";
        }
        if (isset($params['price'])) {
            $str_price = $params['price'];
            $str_filter .= " AND $str_price";
        }

        $sql_select = "SELECT products.*, categories.name AS category_name FROM products 
                        INNER JOIN categories ON categories.id = products.category_id
                        WHERE categories.id = 1
                        ORDER BY products.created_at DESC";

        $obj_select = $this->connection->prepare($sql_select);
        $obj_select->execute();

        $products = $obj_select->fetchAll(PDO::FETCH_ASSOC);
        return $products;
    }


    public $id;
    public $category_id;
    public $title;
    public $avatar;
    public $price;
    public $amount;
    public $summary;
    public $content;
    public $seo_title;
    public $seo_description;
    public $seo_keywords;
    public $status;
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


    public function getAll()
    {
        $obj_select = $this->connection
            ->prepare("SELECT products.*, categories.name AS category_name FROM products 
                        INNER JOIN categories ON categories.id = products.category_id
                        WHERE TRUE $this->str_search
                        ORDER BY products.created_at DESC
                        ");

        $arr_select = [];
        $obj_select->execute($arr_select);
        $products = $obj_select->fetchAll(PDO::FETCH_ASSOC);

        return $products;
    }

    public function getAllPagination($arr_params, $id)
    {
        $limit = $arr_params['limit'];
        $page = $arr_params['page'];
        $start = ($page - 1) * $limit;
        $obj_select = $this->connection
            ->prepare("SELECT products.*, categories.name AS category_name FROM products 
                        INNER JOIN categories ON categories.id = products.category_id
                        WHERE TRUE $this->str_search or categories.id = $id
                        ORDER BY products.updated_at DESC, products.created_at DESC
                        LIMIT $start, $limit
                        ");

        $arr_select = [];
        $obj_select->execute($arr_select);
        $products = $obj_select->fetchAll(PDO::FETCH_ASSOC);

        return $products;
    }


    public function countTotal()
    {
        $obj_select = $this->connection->prepare("SELECT COUNT(id) FROM products WHERE TRUE $this->str_search");
        $obj_select->execute();

        return $obj_select->fetchColumn();
    }
    public function listData()
    {

        $sql_select_all = "SELECT * FROM categories";

        $obj_select_all = $this->connection->prepare($sql_select_all);

        $obj_select_all->execute();

        $categories = $obj_select_all->fetchAll(PDO::FETCH_ASSOC);
        return $categories;
    }
}