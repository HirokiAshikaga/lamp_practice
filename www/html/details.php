<?php
require_once '../conf/const.php';
require_once MODEL_PATH . 'functions.php';
require_once MODEL_PATH . 'user.php';
require_once MODEL_PATH . 'cart.php';
require_once MODEL_PATH . 'purchase.php';

session_start();

if(is_logined() === false){
  redirect_to(LOGIN_URL);
}

$db = get_db_connect();
$user = get_login_user($db);

$token = get_post('csrf_token');

if(is_valid_csrf_token($token) === false){
  exit('不正なリクエスト');
}

$order_id = get_post('order_id');

$details = get_details($db, $order_id);
$order_detail = get_order_detail($details);
$total_price = sum_carts($details);

include_once VIEW_PATH . 'details_view.php';