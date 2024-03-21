<div class="ct">
    <!-- 使用js來跳轉頁面 -->
    <button onclick="location.href='add_admin'">新增管理員</button>
</div>
<table class="all ct">
    <tr>
        <td class="tt">帳號</td>
        <td class="tt">密碼</td>
        <td class="tt">管理</td>
    </tr>
    <?php
    $rows = $Admin->all();
    foreach ($rows as $row) {
    ?>
        <tr>
            <td class="pp"><?= $row['acc']; ?></td>
            <td class="pp"><?= str_repeat("*", mb_strlen($row['pw'])); ?></td>

            <td class="pp">
                <?php
                // 判斷是否為最高權限
                if ($row['acc'] == 'admin') {
                    echo "此帳號為最高權限";
                } else {
                ?>
                    <!-- 如果不是最高權限就可以修改刪除 -->
                    <!-- 使用js來跳轉頁面至修改功能，並帶上資料id -->
                    <button onclick="location.href='?do=edit_admin&id=<?= $row['id']; ?>'">修改</button>
                    <!-- 使用js來跳轉頁面至刪除功能，並帶上資料id -->
                    <button onclick="del('admin', <?= $row['id']; ?>)">刪除</button>
                <?php
                }
                ?>
            </td>
        </tr>
    <?php
    }
    ?>
</table>
<div class="ct">
    <button>返回</button>
</div>