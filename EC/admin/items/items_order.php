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
    <title>商品発注</title>
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
        行数を変更する処理(数量)
        ページを表示した時に一覧が表示されており、
        下のフォームで商品番号と数量を指定するとその分だけ増える仕様
        <div class="cover">
            <form method="POST" action="">
                <div class="login">
                    <p><input type="number" name="order" placeholder="追加番号" value=""></p>
                    <p><input type="number" name="o_count" placeholder="追加数" value=""></p>
                    <input type="submit" name="submit" value="商品追加">
                </div>
            </form>
        </div>
        <p class="ans">
        <?php
        $filename = "items.csv";
        $date = date("Y年m月d日 H時i分s秒");
        if (isset($_POST["o_count"])) {
            $o_count = $_POST["o_count"];
        }
        if (isset($_POST["order"])) {
            $order = $_POST["order"];
        }
        if (!empty($o_count) && !empty($order)) {
            $flag = 0;
            $lines = file($filename);
            $fp = fopen($filename, "w");
            for ($k = 0; $k < count($lines); $k++) {
                $line = explode(",", $lines[$k]);
                $onum = $line[0];
                if ($onum == $order){
                    fwrite($fp, $line[0].",".$line[1].",".$line[2].",".$line[3].",".$line[4] + $o_count.",".$line[5].",".$line[6].",".$date.PHP_EOL);
                    $flag = 1;
                } else {
                    fwrite($fp, $lines[$k]);
                }
            }
            fclose($fp);
            if ($flag == 1) {
                echo "商品追加しました。<br><br>";
            } else {
                echo "追加番号の商品がありませんでした。<br><br>";
            }
            
        }
        ?>
        </p>
        <?php
        if(file_exists($filename)){
            $lines = file($filename,FILE_IGNORE_NEW_LINES);
            foreach($lines as $line){
                echo $line."<br>";
            }
        }
        ?>
    </main>
    <footer>
        <small>&copy;2021 Ban</small>
    </footer>
</body>
</html>