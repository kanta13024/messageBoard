<?php

// セッション開始
session_start();

if (!isset($_GET["m_id"])) {
    exit();
} else {
    $m_id = $_GET["m_id"];
    $_SESSION["m_id"] = $m_id;  //主キーを$_SESSION格納
}
// データベースに接続
require_once('dbc.php');
$dbh = dbConect();

//変更するデータを取得
$updateSql = "SELECT * FROM message WHERE (m_id = :m_id);"; //プレースホルダーを使用
$updateStmt = $dbh->prepare($updateSql);
$updateStmt->bindParam(":m_id", $m_id);
$updateStmt->execute();
$result = $updateStmt->fetch(PDO::FETCH_ASSOC);
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
    <div class="wrapper clearfix">

        <main class="main">

            <h2 class="heading">投稿の編集</h2>

            <ul class="scroll-list">
                <!-- 変更データの表示 -->
                <li class="scroll-item">
                    <form action="update-confirm.php" method="POST">
                        <table border="1">
                            <tr>
                                <td>名前</td>
                                <td><input type="text" id="m_name" name="m_name" size="30" value="<?php echo $result["m_name"] ?>"></td>
                            </tr>
                            <tr>
                                <td>メッセージ</td>
                                <td><textarea name="m_message" id="m_message" cols="30" rows="10" style="margin: 0px; width: 595px; height: 70px;" ><?php echo $result["m_message"]?></textarea></td>
                            </tr>
                            <tr>
                                <td colspan="2" style="text-align:center">
                                    <input type="submit" id="submit" value="確認する">
                                </td>
                            </tr>
                        </table>
                        <div class="append"></div>
                    </from>
                </li>
            </ul>



        </main>

        <div class="sidemenu">
            <div class="sidemenu-title">
                <span class="sidemenu-head">
                    Tool Box
                </span>
            </div>

            <ul>
                <li>
                    <div class="sidemenu-box">
                        <a href="./index.html">
                            <span class="title">
                                Make Password!
                            </span>
                        </a>
                    </div>
                </li>

                <li>
                    <div class="sidemenu-box">
                        <a href="./count.html">
                            <span class="title">
                                Count Word!
                            </span>
                        </a>
                    </div>
                </li>

            </ul>
        </div>
    </div>

    <footer class="footer">

    </footer>
</body>

</html>