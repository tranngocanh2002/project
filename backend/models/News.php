<?php
require_once 'models/Model.php';

class News extends Model
{

    public $id;
    public $category_id;
    public $name;
    public $title;
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

    public function getAll()
    {
        $obj_select = $this->connection
            ->prepare("SELECT news.*, categories.name AS category_name FROM news 
                        INNER JOIN categories ON categories.id = products.category_id
                        WHERE TRUE $this->str_search
                        ORDER BY news.created_at DESC
                        ");

        $arr_select = [];
        $obj_select->execute($arr_select);
        $news = $obj_select->fetchAll(PDO::FETCH_ASSOC);

        return $news;
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

    public function insert()
    {
        $obj_insert = $this->connection
            ->prepare("INSERT INTO news(category_id, name,summary , avatar, content,status, seo_title, seo_description, seo_keywords, title) 
                                VALUES (:category_id, :name, :summary, :avatar, :content, :status, :seo_title, :seo_description, :seo_keywords, :title)");
        $arr_insert = [
            ':category_id' => $this->category_id,
            ':name' => $this->name,
            ':summary' => $this->summary,
            ':avatar' => $this->avatar,
            ':content' => $this->content,
            ':status' => $this->status,
            ':seo_title' => $this->seo_title,
            ':seo_description' => $this->seo_description,
            ':seo_keywords' => $this->seo_keywords,
            ':title' => $this->title,
        ];
        return $obj_insert->execute($arr_insert);
    }

    public function getById($id)
    {
        $obj_select = $this->connection
            ->prepare("SELECT news.*, categories.name AS category_name FROM news 
          INNER JOIN categories ON news.category_id = categories.id WHERE news.id = $id");

        $obj_select->execute();
        return $obj_select->fetch(PDO::FETCH_ASSOC);
    }


    public function update($id)
    {
        $obj_update = $this->connection
            ->prepare("UPDATE news SET category_id=:category_id, name=:name, summary=:summary, avatar=:avatar, 
                content=:content, status=:status, seo_title=:seo_title, seo_description=:seo_description, seo_keywords=:seo_keywords, updated_at=:updated_at,title=:title WHERE id = $id
");
        $arr_update = [
            ':category_id' => $this->category_id,
            ':name' => $this->name,
            ':summary' => $this->summary,
            ':avatar' => $this->avatar,
            ':content' => $this->content,
            ':status' => $this->status,
            ':seo_title' => $this->seo_title,
            ':seo_description' => $this->seo_description,
            ':seo_keywords' => $this->seo_keywords,
            ':updated_at' => $this->updated_at,
            ':title' => $this->title,

        ];
        return $obj_update->execute($arr_update);
    }

    public function delete($id)
    {
        $obj_delete = $this->connection
            ->prepare("DELETE FROM news WHERE id = $id");
        return $obj_delete->execute();
    }
}