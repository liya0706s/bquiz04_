<?php
/**
 * 複製./api/save_admin.php, 更名為./api/save_mem.php
 */

include_once "db.php";
$Mem->save($_POST);
to("../back.php?do=mem");

?>