<?php
// セッションスタート
session_start();

// 変更内容確認
$m_name = chkString($_POST["m_name"], "名前");
$m_message = chkString($_POST["m_message"], "メッセージ");
// 変更内容をセッションに格納
$_SESSION["m_name"] = $m_name;
$_SESSION["m_message"] = $m_message;
// 入力値の確認・加工
function chkString($temp = "", $field = "", $accept_empty = false)
{
    // 未入力の確認
    if (empty($temp) and !$accept_empty) {
        echo $field . "には何か入れてください";
        exit();
    }
    // 入力内容を安全な値に
    $temp = htmlspecialchars($temp, ENT_QUOTES, "UTF-8");
    // 加工後の文字列を返す
    return $temp;
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
    <div class="wrapper clearfix">

        <main class="main">

            <h2 class="heading">投稿の編集</h2>

            <ul class="scroll-list">
                <!-- 変更データの表示 -->
                <li class="scroll-item">
                    <form action="update-submit.php" method="POST">
                        <table border="1">
                            <tr>
                                <td><span class="name">名前</span></td>
                                <td>
                                    <div class="circle">
                                        <span class="name"><?php echo $m_name ?></span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>メッセージ:</td>
                                <td><?php echo nl2br($m_message) ?></td>
                            </tr>
                            <tr>
                                <td colspan="2" style="text-align:center">
                                    <input type="submit" value="変更する">
                                </td>
                            </tr>
                        </table>
                    </from>
                </li>
            </ul>

            <!-- 投稿用データ入力画面 -->
            <div id="sampleModal" class="samplemodal">
                <div class="samplemodal-wrap">
                    <div class="samplemodal-bg"></div>
                    <div class="samplemodal-box">
                        <div class="inner">
                            <!-- データ入力画面 -->

                            <div class="samplemodal-close"><span>閉じる</span></div>
                        </div>
                    </div>
                </div>
            </div>



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