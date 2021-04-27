<?php
// 入力値の検証・安全な値へ
if (empty($_POST)) {
    exit;
  } else {
    $m_name = htmlspecialchars($_POST["m_name"], ENT_QUOTES, "UTF-8");
    $m_message = htmlspecialchars($_POST["m_message"], ENT_QUOTES, "UTF-8");
  }

// 接続設定
$dbtype = "mysql";
$sv = "localhost";
$dbname = "bulletin_board";
$user = "root";
$pass = "root";

// データベースに接続
$dsn = "$dbtype:dbname=$dbname;host=$sv";
$conn = new PDO($dsn, $user, $pass);

// データの取得
$getSql = "SELECT * FROM message ORDER BY m_id DESC";
$getStmt = $conn->prepare($getSql);
$getStmt->execute();

// データの追加
$addSql = "INSERT INTO message (m_name, m_message, m_dt) VALUES (:m_name, :m_message, NOW())";
$addStmt = $conn->prepare($addSql);
$addStmt->bindParam(":m_name", $m_name);
$addStmt->bindParam(":m_message", $m_message);
$addStmt->execute();

// ポストデータの破棄
$_POST = array();
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
                <li class="nav-item active"><a href="#">Home</a></li>
                <li class="nav-item"><a href="#">About</a></li>
                <li class="nav-item"><a href="#">News</a></li>
                <li class="nav-item"><a href="#">Topics</a></li>
                <li class="nav-item"><a href="#">Blog</a></li>
            </ul>
        </nav>
    </header>

    <div class="wrapper clearfix">

        <main class="main">

            <h2 class="heading">メッセージ一覧</h2>

            <ul class="scroll-list">
                <!-- データの一覧の表示 -->
                <?php
                while ($row = $getStmt->fetch()) {
                    echo "<li class=\"scroll-item\">";
                    echo "<a href=\"#\">";
                    echo "<time class=\"date\" datetime=\"" . date("Y-m-d", strtotime($row["m_dt"])) . "\">" . date("Y-m-d", strtotime($row["m_dt"])) . "</time>";
                    echo "<span class=\"name\">" . $row["m_name"] . "</span>";
                    echo "<span class=\"title\">" . nl2br($row["m_message"]) . "</span>";
                    echo "</a>";
                    echo "</li>";
                }

                ?>
                <li class="scroll-item">
                    <a href="">
                        <time class="date" datetime="2021-03-29">2021.03.29</time>
                        <div class="circle">
                        <span class="name">神原検事</span>
                        </div>
                        <span class="title">Worksを更新しましたWorksを更新しましたWorksを更新しましたWorksを更新しましたWorksを更新しましたWorksを更新しましたWorksを更新しました</span>
                    </a>
                    <a class="update" href="update.php">変更する</a>
                    <a class="delete" href="delete.php">削除する</a>
                </li>

                <li class="scroll-item">
                    <a href="">
                        <time class="date" datetime="2021-03-29">2021.03.29</time>
                        <span class="title">Worksを更新しました</span>
                    </a>
                </li>

                <li class="scroll-item">
                    <a href="">
                        <time class="date" datetime="2021-03-29">2021.03.29</time>
                        <span class="title">Worksを更新しました</span>
                    </a>
                </li>

                <li class="scroll-item">
                    <a href="">
                        <time class="date" datetime="2021-03-29">2021.03.29</time>
                        <span class="title">Worksを更新しました</span>
                    </a>
                </li>

                <li class="scroll-item">
                    <a href="">
                        <time class="date" datetime="2021-03-29">2021.03.29</time>
                        <span class="title">Worksを更新しました</span>
                    </a>
                </li>

                <li class="scroll-item">
                    <a href="">
                        <time class="date" datetime="2021-03-29">2021.03.29</time>
                        <span class="title">Worksを更新しましたよろこびのあまり、ちんこがでてきたっていうのは嘘だから気にしないでテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミーテキストダミー</span>
                    </a>
                </li>

            </ul>

            <div id="sampleModal" class="samplemodal">
                <div class="samplemodal-wrap">
                    <div class="samplemodal-bg"></div>
                    <div class="samplemodal-box">
                        <div class="inner">
                            <!-- データ入力画面 -->
                            <form action="index.php" method="POST">
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
                                            <input type="submit" value="投稿する">
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

</html>