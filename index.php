<?php
require_once('dbc.php');
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
                <li class="nav-item"><a class="samplemodal-open">addmessage</a></li>
            </ul>
        </nav>
    </header>

    <div class="wrapper clearfix">

        <main class="main">

            <h2 class="heading">メッセージ一覧</h2>

            <ul class="scroll-list">
                <!-- データの一覧の表示 -->
                <?php
                foreach ($messageDate as $row) {
                    echo "<li class=\"scroll-item\">";
                    echo "<a href=\"#\">";
                    echo "<time class=\"date\" datetime=\"" . date("Y-m-d", strtotime($row["m_dt"])) . "\">" . date("Y-m-d", strtotime($row["m_dt"])) . "</time>";
                    echo "<div class=\"circle\">";
                    echo "<span class=\"name\">" . $row["m_name"] . "</span>";
                    echo "</div>";
                    echo "<span class=\"title\">" . nl2br($row["m_message"]) . "</span>";
                    echo "</a>";
                    echo "<a class=\"update\" href=\"update.php?m_id=" . $row["m_id"] . "\" >変更する</a>";
                    echo "<a class=\"delete\" href=\"delete.php?m_id=" . $row["m_id"] . "\" >削除する</a>";
                    echo "</li>";
                }
                ?>
                <!-- 下記ダミーです -->
                <li class="scroll-item">
                    <a href="">
                        <time class="date" datetime="2021-03-29">2021.03.29</time>
                        <span class="title">テキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミー</span>
                    </a>
                    <a class="update" href="#">変更する</a>
                    <a class="delete" href="#">削除する</a>
                </li>

            </ul>

            <!-- 投稿用データ入力画面 -->
            <div id="sampleModal" class="samplemodal">
                <div class="samplemodal-wrap">
                    <div class="samplemodal-bg"></div>
                    <div class="samplemodal-box">
                        <div class="inner">
                            <!-- データ入力画面 -->
                            <form action="message-submit.php" method="POST">
                                <table border="1">
                                    <tr>
                                        <td>名前</td>
                                        <td><input type="text" id="m_name" name="m_name" size="30"></td>
                                    </tr>
                                    <tr>
                                        <td>メッセージ</td>
                                        <td><textarea name="m_message" id="m_message" cols="30" rows="10" style="margin: 0px; width: 595px; height: 70px;"></textarea></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" style="text-align:center">
                                            <input type="submit" id="submit" value="投稿する">
                                        </td>
                                    </tr>
                                </table>
                                </from>
                                <div class="append"></div>
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
<script>
// 投稿ボタンを押した時のバリデーション
    $(function() {
        $('input#submit').on('click', function() {
            let error;
            let textvalue = $("textarea#m_message").val();
            let namevalue = $("input#m_name").val();
            if (textvalue == "" || !textvalue.match(/[^\s\t]/) || $(this).val().length >= 150) {
                error = true;
            }
            if (namevalue == "" || !namevalue.match(/[^\s\t]/)) {
                error = true;
            }

            if (error) {
                // エラー時の処理
                alert("名前とメッセージは必須です");
                return false;
            }

        })
    })
</script>

</html>