<?php

require_once 'pdo.php';

function category_insert($name)
{
  $sql = "insert into categories(name) values(?)";
  pdo_execute($sql, $name);
}

function category_update($id, $name)
{
  $sql = "update categories set name=? where category_id=?";
  pdo_execute($sql, $name, $id);
}

function category_delete($id)
{
  $sql = "update categories set name = 'remove' where category_id=?";

  pdo_execute($sql, $id);

  $sql = "update products set category_id = 1 where category_id=?";
  pdo_execute($sql, $id);
  // }
}

function category_select_all()
{
  $sql = "select * from categories where name != 'remove'";
  return pdo_query($sql);
}

function category_select_by_id($id)
{
  $sql = "select * from categories where category_id=?";
  return pdo_query_one($sql, $id);
}

function category_exist($id)
{
  $sql = "select count(*) from categories where category_id=?";
  return pdo_query_value($sql, $id) > 0;
}

function category_count()
{
  $sql = "select count(*) from categories where name != 'remove'";
  return pdo_query_value($sql);
}