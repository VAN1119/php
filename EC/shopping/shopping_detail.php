<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="wcountth=device-wcountth, initial-scale=1.0">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/style.css">
    <!-- h1 fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Indie+Flower&display=swap" rel="stylesheet">
    <link rel="icon" href="../images/net_shop.png">
    <title>商品詳細</title>
</head>
<body>
    <header>
        <h1>Electric Commerce store</h1>
    </header>
    <nav>
        <ul class="nav">
            <a class="btn" href="../user/user_top.php">トップ画面        </a>
            <li><a class="btn" href="shopping_favorite.php">お気に入り</a></li>
            <li>
                <form action="" method="post">
                    <input type="search" name="search" placeholder="アイテムを探す">
                    <input type="submit" name="" value="検索">
                </form>
                <?php
                $fileitems = "../csv/items.csv";
                $ilines = file($fileitems,FILE_IGNORE_NEW_LINES);
                $fileserch = "../csv/serch.csv";
                $sfp = fopen($fileserch, "w");
                $sflag = 0;
                foreach ($ilines as $iline) {
                    $iarray = explode(",", $iline);
                    if (preg_match($search, $iarray[1])) {
                        fwrite($fp, $ilines.PHP_EOL);
                        $sflag = 1;
                    }
                }
                if ($sflag == 1) {
                    header("Location:shopping_serch.php");
                } else {
                    echo "お探しの商品は見つかりませんでした。";
                }
                fclose($fp);
                ?>
            </li>
        </ul>
    </nav>
    <main>
        <div class="cover">
            <h2>商品詳細画面</h2>
        </div>
        <div class="item_explain">
            <img class="item_img" src="../images/net_shop.png" alt="表示例" width="200px">
            <div class="item_word">
                <p class="item_name">アイテム名</p>
                <p class="item_comment">1行目説明文説明文説明文説明文説明文説明文説明文説明文説明文<br>2行目説明文説明文説明文説明文説明文説明文説明文説明文説明文<br>3行目説明文説明文説明文説明文説明文説明文説明文説明文説明文</p>
                <p class="item_price">￥￥￥,￥￥￥円</p>
            </div>
        </div>
        <div class="buy_btn">
            <form method="POST" action="">
                <input class="start_btn buy_btn2" type="number" name="count" placeholder="数量" value="">
                <input class="start_btn buy_btn2" type="submit" name="cart" value="カートへ追加">
            </form>
        </div>
        <div class="item_favorite">
            <form method="POST" action="">
            <input class="start_btn buy_btn2" type="submit" name="favorite" value="お気に入りへ追加">
            </form>
            <a class="start_btn buy_btn2" href="shopping_cart.php">カートへ移動</a>
        </div>
        <p class="ans">
        <?php
        $item_num = 1002;
        $item_pic = "net_shop.png"; // picは後でitems.csvの項目に入れる
        $filename = "../csv/items.csv";
        $lines = file($filename);
        $i;
        for ($k = 0; $k < count($lines); $k++) {
            $array = explode(",", $lines[$k]);
            if ($item_num == $array[0]) {
                $i = $k;
            }
        }
        // lines[i]を改行を削除して変数に代入
        $item_info = str_replace(PHP_EOL, '', $lines[$i]);
        // echo "番号:".$array[0]." 品名:".$array[1]." 説明:".$array[2]." 金額:".$array[3]." 在庫:".$array[4]."<br>";
        if (isset($_POST["count"])) {
            $count = $_POST["count"];
        }
        if (isset($_POST["favorite"])) {
            $favorite = "お気に入り";
        }
        if (!empty($count)) {
            $filecart = "../csv/cart.csv";
            $fp = fopen($filecart, "a");
            fwrite($fp, $item_info.",".$count.PHP_EOL);
            // 必要項目：数量、商品名、単価
            fclose($fp);
            echo "カートへ追加しました。";
        } else if (empty($count) && empty($favorite)) {
            echo "数量を入力してください。";
        } else {
            $filefavo = "../csv/favorite.csv";
            $fp = fopen($filefavo, "a");
            fwrite($fp, $item_info.PHP_EOL);
            // 必要項目：商品名、単価、商品画像名
            fclose($fp);
            echo "お気に入りへ追加しました。";
        }
        ?>
        </p>
    </main>
    <footer>
        <small>&copy;2021 Ban</small>
    </footer>
</body>
</html>