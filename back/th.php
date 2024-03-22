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
    <tr class="tt ct">
        <td>流行皮件xxx</td>
        <td class="ct">
            <button>修改</button>
            <button>刪除</button>
        </td>
    </tr>
    <tr class="pp ct">
        <td>女用皮件xxx</td>
        <td>
            <button>修改</button>
            <button>刪除</button>
        </td>
    </tr>
</table>
<h2 class="ct">商品管理</h2>
<div class="ct"><button>新增商品</button></div>
<table class="all">
    <tr class="tt ct">
        <td>編號</td>
        <td>商品名稱</td>
        <td>庫存量</td>
        <td>狀態</td>
        <td>操作</td>
    </tr>
    <tr class="pp">
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td>
            <button>修改</button>
            <button>刪除</button>
            <button>上架</button>
            <button>下架</button>
        </td>
    </tr>
</table>


<!-- 撰寫新增大分類和新增中分類的js函式，使用一個參數來控制要新增的項目，完成後重新載入頁面 -->
<script>
    // 拿到大分類 big_id=0 ; 不是0的話代表是中分類
    getTypes(0)

    // getTypes參數是資料表欄位中的big_id 
    // types多個選項 
    // #bigs 選單 option的值是 html()
    function getTypes(big_id){
        $.get("./api/get_types.php", {big_id}, (types)=>{
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

    
</script>