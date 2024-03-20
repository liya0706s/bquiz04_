<?php
session_start();

// session存入的驗證碼和輸入的GET值ans有一致是1
echo ($_SESSION['ans']==$_GET['ans'])?1:0;


?>