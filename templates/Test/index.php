<?php
try{
    $db = new PDO('mysql:dbname=anime;host=localhost;charset=utf8','root','irina0773555666');    
}catch(PDOException $e){
    echo 'DB接続エラー！: ' . $e->getMessage();
}
?>

<div>
    <h1>観たいアニメ管理リスト</h1>
</div>
    
<div class="box15">
    <form action="./result" method="POST">
    <input
    type="hidden" name="_csrfToken" autocomplete="off"
    value="<?= $this->request->getAttribute('csrfToken') ?>">
    <div class="cp_iptxt">
        <tr>
            <td><input type="text" placeholder="タイトル" name="animeTitle" size="30" maxlength="50"><i class="fa fa-user fa-lg fa-fw" aria-hidden="true"></i></td>
        </tr>
    </div>

    <div class="cp_ipcheck">
        <table>
            <tr>
                <th><b>ジャンル</b></th>
                <th><b>期待度</b></th>
            </tr>
        
            <tr>
                <td><label><input type="checkbox" class="option-input02 checkbox" name="genre[]" value="異世界系">異世界系</label></td>
                <td><label><input type="checkbox" class="option-input02 checkbox" name="reason[]" value="すごく気になる">すごく気になる</label></td>
            </tr>

            <tr>
                <td><label><input type="checkbox" class="option-input02 checkbox" name="genre[]" value="アクション">アクション</label></td>
                <td><label><input type="checkbox" class="option-input02 checkbox" name="reason[]" value="友達から勧めてもらった">友達から勧めてもらった</label></td>
            </tr>
            
            <tr>
                <td><label><input type="checkbox" class="option-input02 checkbox" name="genre[]" value="ファンタジー">ファンタジー</label></td>
                <td><label><input type="checkbox" class="option-input02 checkbox" name="reason[]" value="暇だったらみる">暇だったらみる</label></td>
            </tr>
                <tr><td><label><input type="checkbox" class="option-input02 checkbox" name="genre[]" value="ミステリー">ミステリー</label></td></tr>
                <tr><td><label><input type="checkbox" class="option-input02 checkbox" name="genre[]" value="コメディ">コメディ</label></td></tr>
                <tr><td><label><input type="checkbox" class="option-input02 checkbox" name="genre[]" value="恋愛">恋愛</label></td></tr>
                <tr><td><label><input type="checkbox" class="option-input02 checkbox" name="genre[]" value="不明">不明</label></td></tr>
            
        </table>

        <div>
            <td>
                <input type="submit" class="btn-border" name="button[]" value="登録">
                <input type="reset" class="btn-border" value="リセット">
                <input type="submit" class="btn-border" name="button[]"  value="削除">  
            </td>
        </div>
    </div>
    </form>
</div>


<h1>観たいアニメリスト</h1>
    <table class="table5">
    <tr><th>タイトル</th><th>ジャンル</th><th>期待度</th></tr>
<?php
    print '';
    foreach($data as $element){
        print "<tr>
                <td>{$element['title']}</td>　<td>{$element['genre']}</td>　<td>{$element['reason']}</td>
            　　</tr>\n";
    }
?>

    </table>