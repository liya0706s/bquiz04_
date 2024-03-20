<?php 
if(!empty($_POST)){
    // 更新bottom物件, 其中bottom欄位是取自POST傳值, id欄位是1
    $Bottom->save(['bottom'=>$_POST['bottom'], 'id'=>1]);
}
?>
<h2 class="ct">編輯頁尾版權區</h2>
<form action="?do=bot" method="post">
    <table class="all">
        <tr>
            <td class="tt">頁尾宣告內容</td>
            <td class="pp">
                <input type="text" name="bottom" 
                value="<?=$Bottom->find(1)['bottom'];?>">
            </td>
        </tr>
    </table>
<div class="ct">
    <input type="submit" value="編輯">
    <input type="reset" value="重置">
</div>
</form>