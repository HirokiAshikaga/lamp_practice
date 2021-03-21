<?php
require_once MODEL_PATH . 'functions.php';
$token = get_csrf_token();
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <?php include VIEW_PATH . 'templates/head.php'; ?>
  
  <title>履歴一覧</title>
  <link rel="stylesheet" href="<?php print(STYLESHEET_PATH . 'index.css'); ?>">
</head>
<body>
  <?php include VIEW_PATH . 'templates/header_logined.php'; ?>
  

  <div class="container">
  <h1>購入履歴</h1>

  <?php include VIEW_PATH . 'templates/messages.php'; ?>

  <?php if(count($orders) > 0){ ?>
      <table class="table table-bordered text-center">
        <thead class="thead-light">
          <tr>
            <th>注文番号</th>
            <th>購入日時</th>
            <th>購入金額</th>
            <th>明細</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($orders as $order){ ?>
          <tr>
            <td><?php print(h($order['order_id'])); ?></td>
            <td><?php print(h($order['order_dated'])); ?></td>
            <td><?php print(number_format($order['total_price'])); ?>円</td>
            <td>
              <form method="post" action="details.php">
                <input type="submit" value="明細画面">
                <input type="hidden" name="order_id" value="<?php print(h($order['order_id'])); ?>">
                <input type="hidden" name="csrf_token" value="<?php print(h($token)); ?>">
              </form>
            </td>
            
          </tr>
          <?php } ?>
        </tbody>
      </table>
    <?php } else { ?>
      <p>購入履歴はありません。</p>
    <?php } ?>
  </div>
  
</body>
</html>