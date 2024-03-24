<?php
include_once "db.php";

// 判斷是否有上傳檔案
if(!empty($_FILES['img']['tmp_name'])){
    // 將檔案移至特定位置
    move_uploaded_file($_FILES['img']['tmp_name'],"../img/{$_FILES['img']['name']}");
    // 將檔案名稱存入表單陣列中
    $_POST['img']=$_FILES['img']['name'];
}
$_POST['no']=rand(100000,999999);
$_POST['sh']=1;

$Goods->save($_POST);
to("../back.php?do=th");

?>