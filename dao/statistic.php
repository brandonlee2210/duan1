<?php

require_once 'pdo.php';

function statistic_product()
{
  $sql = "select c.category_id, c.name,"
    . "count(*) as quantity "
    . "min(p.price) as minPrice, "
    . "max(p.price) as maxPrice,"
    . "avg(p.price) as avgPrice "
    . "from products p join categories c on p.category_id=c.category_id "
    . "group by c.category_id, c.name";

  return pdo_query($sql);
}

function statistic_comment_pagination($start_limit, $end_limit)
{
  $sql = "SELECT p.name, p.product_id,
  COUNT(*) as quantity, 
  MIN(cm.created_at) as firstDate, 
  MAX(cm.created_at) as lastDate
FROM comments cm 
JOIN products p ON cm.product_id=p.product_id 
GROUP BY p.name, p.product_id
HAVING quantity > 0
LIMIT $start_limit, $end_limit";

  return pdo_query($sql);
}

function statistic_comment()
{
  $sql = "SELECT p.name, p.product_id,
  COUNT(*) as quantity, 
  MIN(cm.created_at) as firstDate, 
  MAX(cm.created_at) as lastDate
FROM comments cm 
JOIN products p ON cm.product_id=p.product_id 
GROUP BY p.name, p.product_id
HAVING quantity > 0";

  return pdo_query($sql);
}

function count_products_has_comments()
{
  $sql = "SELECT count(*) FROM products p JOIN comments cm ON p.product_id=cm.product_id";
  return pdo_query_value($sql);
}

function statistic_order()
{
  $sql = " SELECT * from orders o  inner join users u on o.user_id = u.user_id 
  ";
  return pdo_query($sql);
}
function statistic_order_items()
{
  $sql = " SELECT * from order_items oi inner join products p on oi.product_id=p.product_id ";
  return pdo_query($sql);
}

// tính doanh thu tổng các đơn hàng có trạng thái đã giao
function total_revenue()
{
  $sql = "SELECT SUM(total_price) FROM orders WHERE status = 2";
  return pdo_query_value($sql);
}

// tính tổng số sản phẩm trong đơn hàng có trạng thái đã giao theo tháng
function total_product_by_month($month)
{
  $sql = "SELECT SUM(quantity) FROM order_items oi INNER JOIN orders o ON oi.order_id = o.order_id WHERE MONTH(o.created_at) = $month AND o.status = 2";
  return pdo_query_value($sql);
}

// tính doanh thu mỗi tháng
function total_revenue_by_month($month)
{
  $sql = "SELECT SUM(total_price) FROM orders WHERE MONTH(created_at) = $month AND status = 2";
  return pdo_query_value($sql);
}