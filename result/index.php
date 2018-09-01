<?php
ini_set('display_errors', 1);

require_once ('../Kakeibo.php');
$is_local = strpos($_SERVER["HTTP_HOST"], 'localhost') !== false ? true : false;

var_dump($is_local);
$HOSTNAME =  $is_local ? '160.16.226.182': 'localhost';
$USERNAME = $is_local ? 'yusuke': 'root';
$PWD = $is_local ? 'yusukesantya': 'yusukesantya';
$kakeibo = new Kakeibo('mysql:dbname=kakeibo; host='.$HOSTNAME.'; port=3306; charset=utf8', $USERNAME, $PWD);

$kakeibo->connect();


if(isset($_GET["month"])){
    $data = $kakeibo->viewMonth($_GET["month"]);
}else{
    // 月選択がないとき
    $data = $kakeibo->getResults();
}
?>
<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Yusuke Expenses Result</title>
    <link rel="stylesheet" href="../css/result.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
<h2>結果確認画面</h2>
<form action="" method="GET" id="form">
    <select name="month" id="month">
<!--    <select name="month" id="month" onChange="submit(this.form)">-->
        <option value="20180701" <?= $_GET["month"] == 20180701 ? "selected": "" ?>>2018/07</option>
        <option value="20180601" <?= $_GET["month"] == 20180601 ? "selected": "" ?>>2018/06</option>
        <option value="20180501" <?= $_GET["month"] == 20180501 ? "selected": "" ?>>2018/05</option>
        <option value="20180401" <?= $_GET["month"] == 20180401 ? "selected": "" ?>>2018/04</option>
        <option value="20180301" <?= $_GET["month"] == 20180301 ? "selected": "" ?>>2018/03</option>
        <option value="20180201" <?= $_GET["month"] == 20180201 ? "selected": "" ?>>2018/02</option>
        <option value="20180101" <?= $_GET["month"] == 20180101 ? "selected": "" ?>>2018/01</option>
    </select>
<!--    <input type="submit" value="表示">-->
</form>

<button onclick="location.href='../data/expenses/<?= '?month='. $_GET["month"] ?>'">JSONを取得</button>
<div class="btn">
    <button onclick="location.href='../'">戻る</button>
</div>

    <table>
        <tr>
            <th>日付</th>
            <th>費目</th>
            <th>金額</th>
        </tr>
        <?php foreach($data as $row): ?>
        <tr>
            <td>
                <p><?= date("Y/m/d", strtotime($row['date'])) ?></p>
            </td>
            <td>
<!--                <select name="e_id" id="e_id">-->
<!--                </select>-->
                <p><?= $row['e_name'] ?></p>
            </td>
            <td>
<!--                <input type="text" name='price' id="price">-->
                <p><?= $row['price'] ?></p>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
<script>
    $('#month').on('change', function () {
       $('#form').submit();
    });
</script>
</body>
</html>