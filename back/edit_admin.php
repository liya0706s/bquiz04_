<!-- 複製./back/add_admin.php並改名為 ./back/edit_admin.php, 根據$_GET['id']的值來取出資料 -->

<?php
// 取出"單筆"管理員資料
$row = $Admin->find($_GET['id']);

// 使用unserialize() 來序列化的權限資料轉回陣列
$pr = unserialize($row['pr']);
?>

<h2 class="ct">修改管理員權限</h2>
<!-- 使用form表單來修改資料 -->
<form action="./api/save_admin.php" method="post">
    <table class="all">
        <tr>
            <td class="tt ct">帳號</td>
            <td class="pp"><input type="text" name="acc" value="<?= $row['acc']; ?>"></td>
        </tr>
        <tr>
            <td class="tt ct">密碼</td>
            <td class="pp"><input type="text" name="pw" value="<?= $row['pw']; ?>"></td>
        </tr>
        <tr>
            <td class="tt ct">權限</td>
            <td class="pp">

                <!-- 檢查資料權限，並勾選已獲得的權限 -->
                <input type="checkbox" name="pr[]" value="1" <?= (in_array(1, $pr)) ? 'checked' : ''; ?>>商品分類與管理<br>
                <input type="checkbox" name="pr[]" value="2" <?= (in_array(2, $pr)) ? 'checked' : ''; ?>>訂單管理<br>
                <input type="checkbox" name="pr[]" value="3" <?= (in_array(3, $pr)) ? 'checked' : ''; ?>>會員管理<br>
                <input type="checkbox" name="pr[]" value="4" <?= (in_array(4, $pr)) ? 'checked' : ''; ?>>頁尾版權管理<br>
                <input type="checkbox" name="pr[]" value="5" <?= (in_array(5, $pr)) ? 'checked' : ''; ?>>最新消息管理<br>
            </td>
        </tr>

    </table>
    <div class="ct">
        <!-- 使用隱藏欄位來傳送資料id -->
        <input type="hidden" name="id" value="<?=$row['id'];?>">
        <input type="submit" value="新增">
        <input type="reset" value="重置">
    </div>
</form>