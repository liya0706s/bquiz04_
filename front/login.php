<h2>第一次購買</h2>
<img src="./icon/0413.jpg" onclick="location.href='?do=reg'">

<h2>會員登入</h2>
<table class="all">
    <tr>
        <td class="tt ct">帳號</td>
        <td class="pp"><input type="text" name="acc" id="acc"></td>
    </tr>
    <tr>
        <td class="tt ct">密碼</td>
        <td class="pp"><input type="password" name="pw" id="pw"></td>
    </tr>
    <tr>
        <td class="tt ct">驗證碼</td>
        <td class="pp">
            <?php
            $a = rand(10, 99);
            $b = rand(10, 99);
            // 採session的方式建立驗證碼，將答案存在session中
            $_SESSION['ans'] = $a + $b;
            echo "{$a}+{$b}= ";
            ?>
            <input type="text" name="ans" id="ans">
        </td>
    </tr>
</table>
<div class="ct">
    <!-- login()函式有參數 -->
    <button onclick="login('mem')">確認</button>
</div>

<script>
// 建立登入函式，並傳入table參數
function login(table){
    // 使用ajax呼叫api/chk_ans.php, 並傳入ans參數
$.get("./api/chk_ans.php", {ans:$("#ans").val()}, (chk)=>{
    // 判斷回傳值是否為0
    if(parseInt(chk)==0){
        alert("驗證碼錯誤，請重新輸入!")
    }else{
        // 回傳值不為0, 使用ajax呼叫api/chk_pw.php, 並傳入table, acc, pw參數
        $.post("./api/chk_pw.php", 
        {table, acc:$("#acc").val(), pw:$("#pw").val()}, (res)=>{
            // 判斷回傳值是否為0
            if(parseInt(res)==0){
                alert("帳號或密碼錯誤，請重新輸入")
            }else{
                location.href='index.php';
            }
        })
    }
})
}
</script>