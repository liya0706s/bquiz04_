<?php
include_once "db.php";
// api這邊計算是否有一筆acc欄位是跟填寫表單的acc一樣
echo $Mem->count(['acc'=>$_GET['acc']]);
?>