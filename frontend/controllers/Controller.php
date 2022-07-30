<?php

class Controller
{


  //chứa nội dung view
  public $content;
  //chứa nội dung lỗi validate
  public $error;

  public $page_title;
  public function __construct()
  {

  }



    /**
     * @param $file string Đường dẫn tới file
     * @param array $variables array Danh sách các biến truyền vào file
     * @return false|string
     */
    public function render($file, $variables = []) {


        extract($variables);

        ob_start();

        require_once $file;

        $render_view = ob_get_clean();

        return $render_view;
    }

}