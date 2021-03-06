<?php
require_once '../conf/const.php';
require_once MODEL_PATH . 'functions.php';
require_once MODEL_PATH . 'user.php';
require_once MODEL_PATH . 'item.php';

session_start();
//ログインしていなければログイン画面へ
if(is_logined() === false){
  redirect_to(LOGIN_URL);
}
//データベース接続
$db = get_db_connect();
//ログイン済みかをチェック
$user = get_login_user($db);
//adminユーザーでなければログイン画面へ
if(is_admin($user) === false){
  redirect_to(LOGIN_URL);
}
//item_id,stockがセットされているかをチェック
$item_id = get_post('item_id');
$stock = get_post('stock');
//在庫数を変更
if(update_item_stock($db, $item_id, $stock)){
  set_message('在庫数を変更しました。');
} else {
  set_error('在庫数の変更に失敗しました。');
}

redirect_to(ADMIN_URL);