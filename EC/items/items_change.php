<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/style.css">
    <!-- h1 fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Indie+Flower&display=swap" rel="stylesheet">
    <link rel="icon" href="../images/net_shop.png">
    <title>商品変更</title>
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
        行数を変更する処理(商品番号、商品名、詳細など)
        ページを表示した時に一覧が表示されており、
        下のフォームで変更したい商品番号と変更希望内容を入力すると、
        その内容に差し変わる仕様
        <div class="cover">
            <div class="login">
                <form method="POST" action="">
                    <p><input type="number" name="edit" placeholder="編集番号" value=""></p>
                    <p><input type="text" name="i_name" placeholder="商品名" value=""></p>
                    <p><input type="text" name="i_comment" placeholder="商品説明" value=""></p>
                    <p><input type="number" name="i_price" placeholder="値段" value=""></p>
                    <p><input type="number" name="i_count" placeholder="在庫数" value=""></p>
                    <input type="submit" name="submit" value="編集">
                </form>
            </div>
        </div>
        <p class="ans">
        <?php
        $filename = "items.csv";
        $lines = file($filename,FILE_IGNORE_NEW_LINES);
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
        if (isset($_POST["edit"])) {
            $edit = $_POST["edit"];
        }
        /* if (!empty($i_name) && !empty($i_comment) && !empty($i_price) && !empty($i_count) && empty($edit)) {
            // 投稿番号取得
            if(file_exists($filename)){
                $lines = file($filename,FILE_IGNORE_NEW_LINES);
                $i = count(file($filename)) + 1;
                for ($k = 0; $k < count($lines); $k++) {
                    $line = explode(",", $lines[$k]);
                    if ($line[0] >= $i) {
                        $i = $line[0] + 1;
                    }
                }
            } else {
                $i = 1001;
            }
            $fp = fopen($filename, "a");
            fwrite($fp, $i.",".$i_name.",".$i_comment.",".$i_price.",".$i_count.","."1".","."5".",".$date.PHP_EOL);
            fclose($fp);
            echo "商品追加しました。<br><br>";
        } else */
        if (!empty($edit)) {
            $flag = 0;
            $lines = file($filename,FILE_IGNORE_NEW_LINES);
            $fp = fopen($filename, "w");
            for ($i = 0; $i < count($lines); $i++) {
                $line = explode(",", $lines[$i]);
                $enum = $line[0];
                if ($enum != $edit){
                    fwrite($fp, $lines[$i].PHP_EOL);
                } else {
                    fwrite($fp, $edit.",".$i_name.",".$i_comment.",".$i_price.",".$i_count.","."1".","."5".",".$date.PHP_EOL);
                    $flag = 1;
                }
            }
            fclose($fp);
            if ($flag == 1) {
                echo "商品変更しました。<br><br>";
            } else {
                echo "編集番号の商品がありませんでした。<br><br>";
            }
        } else {
            echo "編集番号を入力してください。";
        }
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
        ?>
    </main>
    <footer>
        <small>&copy;2021 Ban</small>
    </footer>
</body>
</html>