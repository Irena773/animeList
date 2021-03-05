<?php
//TestController.php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;

class TestController extends AppController
{
    public function initialize() :void
    {
      //testレイアウトを指定
      $this->viewBuilder()->setLayout('test');
    }
    public function index()
    {
      $str =  $this->request->getData('text1');
      if($str != null){
        $this->set('message', 'you typed:'. $str);
      }else{
        $this->set('message', 'you type please!');
      }

      //変数teststrをセット
      $this->set('teststr', 'テスト文章てすてすてす！');

      $sql = "SELECT * FROM watchlist";

      $connection = ConnectionManager::get('default');
      //    SQL文の設定
      $data = $connection->query($sql)->fetchAll('assoc');
      
      //    出力結果のデータを渡す
      $this->set('data', $data);
    }

    public function result()
    {
        $button = implode(",", $_POST["button"]);
        $title_name = $_POST["animeTitle"];

      if(isset($_POST["genre"]) && isset($_POST["reason"])){
        $genre_data = implode("," ,$_POST["genre"]);
        $reason_data = implode(",", $_POST["reason"]);

        switch($genre_data){
          case "異世界系":
              $genre_data = "異世界系";
              break;
          case "アクション":
              $genre_data = "アクション";
              break;
          case "ファンタジー":
              $genre_data = "ファンタジー";
              break;
          case "ミステリー"  :
              $genre_data = "ミステリー";        
              break;
          case "コメディ":
              $genre_data ="コメディ";
              break;
          case "恋愛":
              $genre_data = "恋愛";
              break;
          case "不明":
              $genre_data = "不明";
              break;        
        }

        switch($reason_data){
          case "すごく気になる":
              $reason_data ="すごく気になる";
              break;
          case "友達から勧めてもらった":
              $reason_data = "友達から勧めてもらった";
              break;
          case "暇だったらみる":
              $reason_data = "暇だったらみる";
              break;    
        }

        switch($button){
          case "登録":
            $sql = "INSERT INTO watchlist VALUES ('$title_name', '$genre_data', '$reason_data')";
            break;
          case "削除":
            $sql = "DELETE FROM watchlist WHERE title='$title_name' and genre='$genre_data' and reason='$reason_data' ";
            break;  
        }
      }

      $connection = ConnectionManager::get('default');
      //    SQL文の設定
      $data = $connection->query($sql)->fetchAll('assoc');
      $this->set('data', $data);
    }

   
}