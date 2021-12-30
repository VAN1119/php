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
            <a href="../user_top.html">トップ画面</a>
            <li><a href="shopping_favorite.html">お気に入り</a></li>
            <li>
                <form action="" method="post">
                    <input type="search" name="search" placeholder="キーワードを入力">
                    <input type="submit" name="submit" value="検索">
                </form>
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
        <div class="buy_btn">
            <form method="POST" action="">
            <input class="start_btn buy_btn2" type="submit" name="favorite" value="お気に入りへ追加">
            </form>
            <a class="start_btn buy_btn2" href="shopping_cart.html">カートへ移動</a>
        </div>
        <?php
        $item_name = "商品名";
        $item_price = 100;
        if (isset($_POST["count"])) {
            $count = $_POST["count"];
        }
        if (isset($_POST["favorite"])) {
            $favorite = "お気に入りへ登録しました。";
        }
        if (!empty($count)) {
            $filecart = "cart.csv";
            $fp = fopen($filecart, "a");
            fwrite($fp, $count.",".$item_name.",".$item_price.PHP_EOL);
            // 必要項目：数量、商品名、単価
            fclose($fp);
            echo "カートへ追加しました。";
        } else if (empty($count) && empty($favorite)) {
            echo "数量を入力してください。";
        } else {
            $filefavo = "favorite.csv";
            $fp = fopen($filefavo, "a");
            fwrite($fp, $item_name.",".$item_price.PHP_EOL);
            // 必要項目：商品名、単価
            fclose($fp);
            echo "お気に入りへ追加しました。";
        }
        ?>
    </main>
    <footer>
        <small>&copy;2021 Ban</small>
    </footer>
</body>
</html>