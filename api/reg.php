<?php
include_once "db.php";
// 註冊時填的資料都包含在資料庫欄位中，除了註冊日期regdate
$_POST['regdate']=date("Y-m-d");
$Mem->save($_POST);
?>