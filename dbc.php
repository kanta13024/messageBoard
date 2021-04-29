<!-- データベースの接続 -->
<?php
function dbConect(){
    // 接続設定
    $dbtype = "mysql";
    $sv = "localhost";
    $dbname = "bulletin_board";
    $user = "root";
    $pass = "root";
    $dsn = "$dbtype:dbname=$dbname;host=$sv";

    try {
        // データベースに接続
        $dbh = new PDO($dsn, $user, $pass,[
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        ]);
    } catch(PDOException $e){
        echo '接続失敗' . $e->getMessage();
        exit();
    };
    return $dbh;
}

// メッセージ一覧の表示
function getMessage(){
    $dbh = dbConect();

    $getSql = "SELECT * FROM message ORDER BY m_id DESC";
    $getStmt = $dbh->prepare($getSql);
    $getStmt->execute();
    $result = $getStmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
    $dbh = null;
};
$messageDate = getMessage();

// データの追加（投稿）
// function postMessage(){
//     $dbh = dbConect();
//     if (empty($_POST)) {
//         exit();
//       } else {
//         //   安全な値に加工・修正して実行
//         $m_name = htmlspecialchars($_POST["m_name"], ENT_QUOTES, "UTF-8");
//         $m_message = htmlspecialchars($_POST["m_message"], ENT_QUOTES, "UTF-8");
//         $addSql = "INSERT INTO message (m_name, m_message, m_dt) VALUES (:m_name, :m_message, NOW() )";
//         $addStmt = $dbh->prepare($addSql);
//         $addStmt->bindParam(":m_name", $m_name);
//         $addStmt->bindParam(":m_message", $m_message);
//         $addStmt->execute();
//       }
//     $_POST = array();
// }
// postMessage();
// メッセージの削除
// function deleteMessage(){
//     $dbh = dbConect();
//     if (empty($_POST)) {
//         exit();
//     } else {
//         // 安全な値に加工して実行
//         $m_id = htmlspecialchars($_POST["m_id"], ENT_QUOTES, "UTF-8");
//         $deleteSql = "DELETE FROM message WHERE (m_id = :m_id)";
//         $deleteStmt = $dbh->prepare($deleteSql);
//         $deleteStmt->bindParam("m_id", $m_id);
//         $deleteStmt->execute();
//     }
//     $_POST = array();
// }
// $_POST = array();
?>

<?php
// $m_id = $_GET["m_id"];

// $dbh = dbconect();
// // SQLの準備
// $dbh->prepare('SELECT * FROM WHERE m_id = :m_id');
// $stmt->bindvalue(':m_id', $m_id, PDO::PARAM_INT);
// // SQLの実行
// $stmt->execute();
// // 結果の表示
// $result = $stmt->fetch(PDO::FETCH_ASSOC);

?>

