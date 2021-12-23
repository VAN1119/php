<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/reset.css">
    <link rel="stylesheet" href="../../css/style.css">
    <!-- h1 fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Indie+Flower&display=swap" rel="stylesheet">
    <link rel="icon" href="../../images/net_shop.png">
    <title>商品削除</title>
</head>
<body>
    <header>
        <h1>Electric Commerce store</h1>
    </header>
    <nav>
        <div class="buy_btn">
            <a class="start_btn buy_btn2" href="../admin_top.php">管理トップ</a>
        </div>
    </nav>
    <main>
        行数を削除する処理(商品削除)
        ページを表示した時に一覧が表示されており、
        下のフォームで商品番号を指定すると
        その行が削除される仕様
        <div class="cover">
            <form method="POST" action="">
                <div class="login">
                    <p><input type="number" name="delete" placeholder="削除番号" value=""></p>
                    <input type="submit" name="submit" value="削除">
                </div>
            </form>
        </div>
        <p class="ans">
        <?php
        $delete = "";
        $filename = "items.csv";
        if (isset($_POST["delete"])) {
            $delete = $_POST["delete"];
        }
        if (!empty($delete)) {
            $lines = file($filename);
            $fp = fopen($filename, "w");
            for ($k = 0; $k < count($lines); $k++) {
                $line = explode(",", $lines[$k]);
                $dnum = $line[0];
                if ($dnum != $delete){
                    fwrite($fp, $lines[$k]);
                }
            }
            fclose($fp);
            echo "商品削除しました。<br><br>";
        }
        if(file_exists($filename)){
            $lines = file($filename,FILE_IGNORE_NEW_LINES);
            foreach($lines as $line){
                echo $line."<br>";
            }
        }
        ?>
        </p>
    </main>
    <footer>
        <small>&copy;2021 Ban</small>
    </footer>
</body>
</html>