<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="wi_nameth=device-wi_nameth, initial-scale=1.0">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/style.css">
    <!-- h1 fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Indie+Flower&display=swap" rel="stylesheet">
    <link rel="icon" href="../images/net_shop.png">
    <title>商品追加</title>
</head>
<body>
    <header>
        <h1>Electric Commerce store</h1>
    </header>
    <nav>
        <div class="buy_btn">
            <a class="start_btn buy_btn2" href="../admin/admin_top.php">管理トップ</a>
        </div>
    </nav>
    <main>
        行数を追加する処理(商品追加)
        ページを表示した時に一覧が表示されており、
        下のフォームで自動的に商品番号を取得して、
        商品名、詳細、数量を指定して追加する仕様
        <div class="cover">
            <form method="POST" action="">
                <div class="login">
                    <p><input type="text" name="i_name" placeholder="商品名" value=""></p>
                    <p><input type="text" name="i_comment" placeholder="商品説明" value=""></p>
                    <p><input type="number" name="i_price" placeholder="値段" value=""></p>
                    <p><input type="number" name="i_count" placeholder="在庫数" value=""></p>
                    <input type="submit" name="submit" value="商品追加">
                </div>
            </form>
        </div>
        <p class="ans">
        <?php
        $filename = "items.csv";
        $date = date("Y年m月d日 H時i分s秒");
        if (isset($_POST["i_name"])) {
            $i_name = $_POST["i_name"];
        }
        if (isset($_POST["i_comment"])) {
            $i_comment = $_POST["i_comment"];
        }
        if (isset($_POST["i_price"])) {
            $i_price = $_POST["i_price"];
        }
        if (isset($_POST["i_count"])) {
            $i_count = $_POST["i_count"];
        }
        if (!empty($i_name) && !empty($i_comment) && !empty($i_price) && !empty($i_count)) {
            // 投稿番号取得
            if(file_exists($filename)){
                $lines = file($filename);
                for ($k = 0; $k < count($lines); $k++) {
                    $line = explode(",", $lines[$k]);
                    $max = $line[0];
                    if ($line[0] >= $max) {
                        $max = $line[0] + 1;
                    }
                    $i = $max;
                }
            } else {
                $i = 1001;
            }
            // ファイル処理
            $fp = fopen($filename, "a");
            fwrite($fp, $i.",".$i_name.",".$i_comment.",".$i_price.",".$i_count.","."1".","."5".",".$date.PHP_EOL);
            fclose($fp);
            echo "商品追加しました。<br><br>";
            ?>
        </p>
            <?php
            if(file_exists($filename)){
                $lines = file($filename,FILE_IGNORE_NEW_LINES);
                foreach($lines as $line){
                    $array = explode(",", $line);
                    echo "番号:".$array[0]." 品名:".$array[1]." 説明:".$array[2]." 金額:".$array[3]." 在庫:".$array[4]."<br>";
                }
            }
        }
        ?>
    </main>
    <footer>
        <small>&copy;2021 Ban</small>
    </footer>
</body>
</html>