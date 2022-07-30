<!DOCTYPE html>
<html lang="en">
<head>
    <base href="<?php echo $_SERVER['SCRIPT_NAME'] ?>" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MVC Demo Frontend</title>
    <link rel="stylesheet" href="assets/css/css_head.css">
    <link rel="stylesheet" href="assets/css/home.css">
    <link rel="stylesheet" href="assets/css/css_filter.css">
    <link rel="stylesheet" href="assets/css/san_pham_list_1.css">
    <link rel="stylesheet" href="assets/css/CV1001-004.css">
    <link rel="stylesheet" href="assets/css/huong_dan_list_1.css">
    <link rel="stylesheet" href="assets/css/huong_dan_list_2.css">
    <link rel="stylesheet" href="assets/css/gioi_thieu.css">
    <link rel="stylesheet" href="assets/css/giohang.css">
    <link rel="stylesheet" href="assets/css/thanh_toan.css">
    <link rel="stylesheet" href="assets/css/tin_tuc_list_1.css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script src="assets/js/script.js"></script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.show-more.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/zebra_tooltips.min.js"></script>


</head>
<body>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<div id="main">
    <?php require_once 'header.php'; ?>
    <div class="container">
      <?php if (isset($_SESSION['error'])): ?>
          <div class="alert alert-danger">
            <?php
            echo $_SESSION['error'];
            unset($_SESSION['error']);
            ?>
          </div>
      <?php endif; ?>

      <?php if (!empty($this->error)): ?>
          <div class="alert alert-danger">
            <?php
            echo $this->error;
            ?>
          </div>
      <?php endif; ?>

      <?php if (isset($_SESSION['success'])): ?>
          <div class="alert alert-success">
            <?php
            echo $_SESSION['success'];
            unset($_SESSION['success']);
            ?>
          </div>
      <?php endif; ?>
    </div>
    <!--    hiển thị nội dung động -->
    <?php echo $this->content; ?>

    <?php require_once 'footer.php'; ?>

</div>


<?php //require_once 'footer.php'; ?>

</body>

</html>