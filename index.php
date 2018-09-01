<?php
    ini_set('display_errors', 1);

    require_once ('Kakeibo.php');
    var_dump($_SERVER["HTTP_HOST"]);
    var_dump(strpos($_SERVER["HTTP_HOST"], 'localhost'));
    $is_local = strpos($_SERVER["HTTP_HOST"], 'localhost') !== false ? true : false;
    var_dump($is_local);
    $HOSTNAME =  $is_local ? '160.16.226.182': 'localhost';

    $USERNAME = $is_local ? 'yusuke': 'root';
    $PWD = $is_local ? 'yusukesantya': 'yusukesantya';
    $kakeibo = new Kakeibo('mysql:dbname=kakeibo; host='.$HOSTNAME.'; port=3306; charset=utf8', $USERNAME, $PWD);

    $kakeibo->connect();

    if($_POST){
        var_dump($_POST["price"]);
        $kakeibo->post();
    }

?>
<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Yusuke Expenses</title>
    <link rel="stylesheet" href="./css/top.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
<div id="container">
    <h2>入力画面</h2>
    <form action="" method="POST">
    <table>
        <tr>
            <th>日付</th>
            <th>費目</th>
            <th>金額</th>
        </tr>
        <tr>
            <td>
            <input type="text" name="date" id="date">
            </td>
            <td>
            <select name="e_id" id="e_id">
                <option value="001">食品</option>
                <option value="002">外食</option>
                <option value="003">生活品</option>
                <option value="004">衣類</option>
                <option value="005">小説・マンガ</option>
                <option value="006">本</option>
                <option value="012">CD・音楽</option>
                <option value="013">文房具</option>
                <option value="007">ネット学習関連</option>
                <option value="008">旅費・交通費</option>
                <option value="014">医療費</option>
                <option value="015">ガジェット・電子パーツ</option>
                <option value="009">電気</option>
                <option value="010">ガス</option>
                <option value="011">水道</option>
            </select>
            </td>
            <td>
            <input type="text" name='price' id="price">
            </td>
            <td>
                <input type="submit" value="送信">
            </td>
        </tr>
    </table>
    </form>
    <div class="btn">
        <button onclick="location.href='./result/?month=20180801'">登録結果確認</button>
    </div>
</div>
    <script>

    </script>
</body>
</html>