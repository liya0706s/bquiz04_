<?php
include_once "db.php";
$table=$_POST['table'];
unset($_POST['table']);
$db=new DB($table);
// 呼叫DB物件的count方法，並傳入$_POST表單資料 
$chk=$db->count($_POST);
if($chk){
    // 回傳值為1, 將acc欄位的值寫入$_SESSION[$table]變數
    echo $chk;
    $_SESSION[$table]=$_POST['acc'];
}else{
    // 回傳值不為1, 顯示0
    echo $chk;
}
?>