<?php
require_once '../conf/const.php';
require_once MODEL_PATH . 'functions.php';
require_once MODEL_PATH . 'user.php';
require_once MODEL_PATH . 'purchase.php';

session_start();

if(is_logined() === false){
  redirect_to(LOGIN_URL);
}

$db = get_db_connect();
$user = get_login_user($db);

if($user['type'] === 1){
    $orders = get_history_all($db);
}else if($user['type'] === 2){
    $orders = get_history($db, $user['user_id']);
}

include_once VIEW_PATH . 'history_view.php';