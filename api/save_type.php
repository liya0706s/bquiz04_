<!-- 把back/th.php中ajax以post傳來的資料存進資料表 -->
<?php
include_once "db.php";
$Type->save($_POST); 
?>