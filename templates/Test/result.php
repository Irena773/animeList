<h1>観たいアニメリストの一覧</h1>
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