<?php
    ini_set('display_errors', 1);

    require_once ('Kakeibo.php');

    $is_local = strpos($_SERVER["HTTP_HOST"], 'localhost') !== false ? true : false;

    $HOSTNAME =  $is_local ? 'db': 'localhost';

    $USERNAME = $is_local ? 'root': 'root';

    $PWD = $is_local ? 'root': 'yusukesantya';

    $kakeibo = new Expenses('mysql:dbname=kakeibo; host='.$HOSTNAME.'; port=3306; charset=utf8', $USERNAME, $PWD);

    $kakeibo->connect();

    if($_POST){
        $php_json = json_encode($_POST["price"]);
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
    <link rel="stylesheet" href="./css/common.css">
    <link rel="stylesheet" href="./css/top.css">
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
    <link rel="stylesheet" href="./node_modules/normalize.css">
    <link rel="stylesheet" href="./node_modules/milligram/dist/milligram.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>

<body>
<header>
    <a href="./">TOP</a>
    <a href="./result/?month=20180801">RESULT</a>
</header>

<div id="container">
    <h2>Register Consumption</h2>

    <form action="" method="POST">
        <fieldset>
            <label for="date">Date</label>
            <input type="text" name="date" id="date" placeholder="20010101">
            <label for="e_id">Expenses</label>
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
            <label for="price">Amount</label>
            <input type="text" name='price' id="price" placeholder="1000">
            <input type="submit" value="REGISTER">
        </fieldset>
    </form>
</div>

</body>
</html>
