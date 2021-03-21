<?php
require_once MODEL_PATH . 'functions.php';
require_once MODEL_PATH . 'db.php';

function get_history($db, $user_id){
    $sql = "
      SELECT
        orders.order_id,
        orders.order_dated,
        SUM(order_details.amount * order_details.price) AS total_price
      FROM
        orders
      JOIN
        order_details
      ON
        orders.order_id = order_details.order_id
      WHERE
        orders.user_id = ?
      GROUP BY
        order_id
      ORDER BY
      order_dated DESC
    ";
    return fetch_all_query($db, $sql, array($user_id));
}

function get_history_all($db){
    $sql = "
      SELECT
        orders.order_id,
        orders.order_dated,
        SUM(order_details.amount * order_details.price) AS total_price
      FROM
        orders
      JOIN
        order_details
      ON
        orders.order_id = order_details.order_id
      GROUP BY
        order_id
      ORDER BY
        order_dated DESC
    ";
    return fetch_all_query($db, $sql);
}

function get_details($db, $order_id){
  $sql = "
    SELECT
      order_details.order_id,
      order_details.item_id,
      order_details.amount,
      order_details.price,
      order_details.create_dated,
      items.name
    FROM
      order_details
    JOIN
      items
    ON
      order_details.item_id = items.item_id
    WHERE
      order_details.order_id = ?
  ";
  return fetch_all_query($db, $sql, array($order_id));
}

function get_order_detail($details){
  foreach($details as $detail){
    $order_detail = $detail;
  }
  return $order_detail;
}