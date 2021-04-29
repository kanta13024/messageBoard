<?php
require_once('dbc.php');
$dbh = dbConect();

// 入力内容の取得
$m_name = htmlspecialchars($_POST["m_name"], ENT_QUOTES, "UTF-8");
$m_message = htmlspecialchars($_POST["m_message"], ENT_QUOTES, "UTF-8");

// データの追加
$addSql = "INSERT INTO message (m_name, m_message, m_dt) VALUES(:m_name, :m_message, NOW())";
$addStmt = $dbh->prepare($addSql);
$addStmt->bindParam(":m_name", $m_name, PDO::PARAM_STR);
$addStmt->bindParam(":m_message", $m_message, PDO::PARAM_STR);
$addStmt->execute();

$error = $addStmt->errorInfo();
if ($error[0] != "00000") {
    $message = "失敗{$error[2]}";
} else {
    $message = "メッセージを投稿しました。" . $dbh->lastInsertId();
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="js/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <title>課題４</title>
</head>

<body>

    <header class="header">
        <h1>Bulletin board</h1>

        <!-- スピンサイドバーメニュー -->
        <input type="checkbox" class="openSidebarMenu" id="openSidebarMenu">
        <label for="openSidebarMenu" class="sidebarIconToggle">
            <div class="spinner diagonal part-1"></div>
            <div class="spinner horizontal"></div>
            <div class="spinner diagonal part-2"></div>
        </label>
        <div id="sidebarMenu">
            <ul class="sidebarMenuInner">
                <li>"KANBARA KENJI"</li>
                <span>Designer Portfolio</span>
                <li>
                    <a class="samplemodal-open">投稿</a>
                </li>
            </ul>
        </div>

        <nav class="global-nav">
            <ul>
                <li class="nav-item active"><a href="index.php">Home</a></li>
                <li class="nav-item"><a href="#">About</a></li>
                <li class="nav-item"><a href="#">News</a></li>
                <li class="nav-item"><a href="#">Topics</a></li>
                <li class="nav-item"><a href="#">Blog</a></li>
            </ul>
        </nav>
    </header>

    <?php 
    echo $message;
    
    ?>
    <p><a href="index.php">トップページへうつる</a></p>
    
</body>