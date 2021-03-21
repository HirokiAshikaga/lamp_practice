<?php
require_once MODEL_PATH . 'functions.php';
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <?php include VIEW_PATH . 'templates/head.php'; ?>
  
  <title>明細画面</title>
  <link rel="stylesheet" href="<?php print(STYLESHEET_PATH . 'index.css'); ?>">
</head>
<body>
  <?php include VIEW_PATH . 'templates/header_logined.php'; ?>
  

  <div class="container">
  <p>注文番号：<?php print(h($order_detail['order_id'])); ?></p>
  <p>購入日時：<?php print(h($order_detail['create_dated'])); ?></p>
  <p>合計金額：<?php print(number_format($total_price)); ?>円</p>
  <table class="table table-bordered text-center">
        <thead class="thead-light">
          <tr>
            <th>商品名</th>
            <th>価格</th>
            <th>数量</th>
            <th>小計</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($details as $detail){ ?>
          <tr>
            <td><?php print(h($detail['name'])); ?></td>
            <td><?php print(number_format($detail['price'])); ?>円</td>
            <td><?php print(h($detail['amount'])); ?>個</td>
            <td><?php print(number_format($detail['price'] * $detail['amount'])); ?>円</td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
  </div>
  
</body>
</html>