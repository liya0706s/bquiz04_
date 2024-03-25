<h2 class="ct">商品分類</h2>
<div class="ct">
    <label for="">新增大分類</label>
    <input type="text" name="big" id="big">
    <button onclick="addType('big')">新增</button>
</div>
<div class="ct">
    <label for="">新增中分類</label>
    <select name="bigs" id="bigs"></select>
    <input type="text" name="mid" id="mid">
    <button onclick="addType('mid')">新增</button>
</div>
<table class="all">
    <?php
    // 撈出所有大分類的資料 
    $bigs = $Type->all(['big_id' => 0]);
    foreach ($bigs as $big) {
    ?>
        <tr class="tt">
            <td><?= $big['name']; ?></td>
            <td class="ct">
                <!-- html funciton 的this是被點擊的DOM物件 -->
                <!-- $(this) 是jquery的，不一樣 -->
                <button onclick="edit(this, <?= $big['id']; ?>)">修改</button>
                <!-- del()函式, 帶入要刪除的資料表名及大分類的id -->
                <button onclick="del('type', <?= $big['id']; ?>)">刪除</button>
            </td>
        </tr>
        <?php
        // 撈出中分類, 他的big_id是大分類的id 
        $mids = $Type->all(['big_id' => $big['id']]);
        foreach ($mids as $mid) {
        ?>
            <tr class="pp ct">
                <td><?= $mid['name']; ?></td>
                <td>
                    <button onclick="edit(this,<?= $mid['id']; ?>)">修改</button>
                    <button onclick="del('type', <?= $mid['id']; ?>)">刪除</button>
                </td>
            </tr>
    <?php
        }
    }
    ?>

</table>
<h2 class="ct">商品管理</h2>
<div class="ct">
    <button onclick="location.href='?do=add_goods'">新增商品</button>
</div>
<table class="all">
    <tr class="tt ct">
        <td>編號</td>
        <td>商品名稱</td>
        <td>庫存量</td>
        <td>狀態</td>
        <td>操作</td>
    </tr>
    <?php
    // 取出所有商品的資料
    $goods=$Goods->all();

    // 使用迴圈來取出資料
    foreach($goods as $g){
    ?>
    <tr class="pp ct">
        <td><?=$g['no'];?></td>
        <td><?=$g['name'];?></td>
        <td><?=$g['stock'];?></td>
        <td><?=($g['sh']==1)?'販售中':'已下架';?></td>
        <td style="padding: 5px">
            <button onclick="location.href='?do=edit_goods&id=<?=$g['id'];?>'">修改</button>
            <button onclick="del('goods', <?=$g['id'];?>)">刪除</button>
            <button onclick="sw(<?=$g['id'];?>,1)">上架</button>
            <button onclick="sw(<?=$g['id'];?>,0)">下架</button>
        </td>
    </tr>
    <?php } ?>
</table>


<!-- 撰寫新增大分類和新增中分類的js函式，使用一個參數來控制要新增的項目，完成後重新載入頁面 -->
<script>
    // 參數是big_id 拿到大分類 big_id=0 ; 大於零的話代表是中分類
    getTypes(0)

    function edit(dom, id) {
        let name = prompt("請輸入你要修改的分類名稱:",
            `${$(dom).parent().prev().text()}`)
        // 取消是空的，非null代表有實際輸入了文字
        if (name != null) {
            $.post("./api/save_type.php", {
                name,
                id
            }, () => {
                // 把那一格的文字內容直接用name變數放進去
                $(dom).parent().prev().text(name);
                // 重整的話，畫面會動一下，若是下方的編輯要再拉下來
                // location.reload();
            })
        }
    }

    // getTypes參數是資料表欄位中的big_id 
    // types多個選項 
    // #bigs 選單 option的值是 html()
    function getTypes(big_id) {
        $.get("./api/get_types.php", {
            big_id
        }, (types) => {
            $("#bigs").html(types)
        })
    }

    function addType(type) {
        // name和big_id是要存進資料表的欄位
        let data = {};
        switch (type) {
            case "big":
                data = {
                    name: $("#big").val(),
                    big_id: 0
                }
                break;
            case "mid":
                data = {
                    name: $("#mid").val(),
                    // 中分類的big_id是，某個大分類ID的值
                    big_id: $("#bigs").val()
                }
                break;
        }
        // 送到後端寫入
        $.post("./api/save_type.php", data, () => {
            location.reload();
        })
    }

    // 宣告一個函式來切換產品的上下架狀態，參數為產品id及顯示狀態
    function sw(id, sh) {
        // 使用ajax來呼叫api/sw.php, 並將id及顯示狀態傳給他
        $.post("./api/sw.php", {id,sh}, () => {
            location.reload();
        })
    }
</script>