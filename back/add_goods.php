<h2 class="ct">新增商品</h2>
<!-- form:post>table.all>tr*9>th.tt.ct+td.pp>input:text -->
<form action="./api/save_goods.php" method="post" enctype="multipart/form-data">
    <table class="all">
        <tr>
            <th class="tt ct">所屬大分類</th>
            <td class="pp">
                <select name="big" id="big"></select>
            </td>
        </tr>
        <tr>
            <th class="tt ct">所屬中分類</th>
            <td class="pp">
                <select name="mid" id="mid"></select>
            </td>
        </tr>
        <tr>
            <th class="tt ct">商品編號</th>
            <td class="pp" id="no">
                完成分類後自動分配
            </td>
        </tr>
        <tr>
            <th class="tt ct">商品名稱</th>
            <td class="pp">
                <input type="text" name="name" id="name">
            </td>
        </tr>
        <tr>
            <th class="tt ct">商品價格</th>
            <td class="pp">
                <input type="number" name="price" id="price">
            </td>
        </tr>
        <tr>
            <th class="tt ct">規格</th>
            <td class="pp">
                <input type="number" name="spec" id="spec">
            </td>
        </tr>
        <tr>
            <th class="tt ct">庫存量</th>
            <td class="pp">
                <input type="number" name="stock" id="stock">
            </td>
        </tr>
        <tr>
            <th class="tt ct">商品圖片</th>
            <td class="pp">
                <input type="file" name="img" id="img">
            </td>
        </tr>
        <tr>
            <th class="tt ct">商品介紹</th>
            <td class="pp">
                <textarea name="intro" id="intro" style="width:80%;height:150px"></textarea>
            </td>
        </tr>
    </table>
    <div class="ct">
        <input type="submit" value="新增">
        <input type="reset" value="重置">
        <input type="button" value="返回" onclick="location.href='?do=th'">
    </div>
</form>