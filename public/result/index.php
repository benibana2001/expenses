<?php
ini_set('display_errors', 1);

require_once ('../Kakeibo.php');
$is_local = strpos($_SERVER["HTTP_HOST"], 'localhost') !== false ? true : false;

$HOSTNAME =  $is_local ? 'db': 'localhost';
$USERNAME = $is_local ? 'root': 'root';
$PWD = $is_local ? 'root': 'yusukesantya';
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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/common.css">
    <link rel="stylesheet" href="../css/result.css">
    <link rel="stylesheet" href="../node_modules/normalize.css">
    <link rel="stylesheet" href="../node_modules/milligram/dist/milligram.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
<header>
    <a href="../">TOP</a>
    <a href="./?month=20180801">RESULT</a>
</header>
<div id="container">
    <h2>Each Month</h2>
    <form action="" method="GET" id="form">
        <label for="month">Choose Month</label>
        <div class="row">
            <select name="month" id="month" class="column">
                <option value="20180701" <?= $_GET["month"] == 20180701 ? "selected": "" ?>>2018/07</option>
                <option value="20180601" <?= $_GET["month"] == 20180601 ? "selected": "" ?>>2018/06</option>
                <option value="20180501" <?= $_GET["month"] == 20180501 ? "selected": "" ?>>2018/05</option>
                <option value="20180401" <?= $_GET["month"] == 20180401 ? "selected": "" ?>>2018/04</option>
                <option value="20180301" <?= $_GET["month"] == 20180301 ? "selected": "" ?>>2018/03</option>
                <option value="20180201" <?= $_GET["month"] == 20180201 ? "selected": "" ?>>2018/02</option>
                <option value="20180101" <?= $_GET["month"] == 20180101 ? "selected": "" ?>>2018/01</option>
            </select>
            <button class="column column-10 column-offset-10 button-black" onclick="event.preventDefault(); location.href='../data/expenses/<?= '?month='. $_GET["month"] ?>'"><i class="fas fa-file"></i></button>
        </div>
    </form>


    <table>
        <thead>
            <tr>
                <th>Date</th>
                <th>Exception</th>
                <th>Amount</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($data as $row): ?>
            <tr>
                <td><?= date("Y/m/d", strtotime($row['date'])) ?></td>
                <td><?= $row['e_name'] ?></td>
                <td><?= $row['price'] ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
<script>
    $('#month').on('change', function () {
       $('#form').submit();
    });
</script>
</body>
</html>
