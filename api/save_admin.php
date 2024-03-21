<?php
/**
 * 新增/更新 管理者帳號
 */

include_once "db.php";

// 使用序列化來儲存權限資料
$_POST['pr']=serialize($_POST['pr']);

// 將表單資料儲存至資料表中
$Admin->save($_POST);

// 導回後台管理頁面
to("../back.php?do=admin");


?>