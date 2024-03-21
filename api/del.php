<?php
// 根據傳入的資料表名稱來建立資料表物件
$db=new DB($_POST['table']);
// 根據傳入的id來刪除資料
$db->del($_POST['id']);
?>