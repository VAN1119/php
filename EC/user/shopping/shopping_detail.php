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
            <img class="item_img" src="../../images/net_shop.png" alt="表示例" width="200px">
            <div class="item_word">
                <p class="item_name">アイテム名</p>
                <p class="item_comment">1行目説明文説明文説明文説明文説明文説明文説明文説明文説明文<br>2行目説明文説明文説明文説明文説明文説明文説明文説明文説明文<br>3行目説明文説明文説明文説明文説明文説明文説明文説明文説明文</p>
                <p class="item_price">￥￥￥,￥￥￥円</p>
            </div>
        </div>
        <div class="buy_btn">
            <form method="POST" action="">
                <input class="start_btn buy_btn2" type="number" name="count" placeholder="数量" value="">
            </form>
            <a class="start_btn buy_btn2" href="#">カートへ追加</a>
        </div>
        <div class="buy_btn">
            <a class="start_btn buy_btn2" href="#">お気に入りへ追加</a>
            <a class="start_btn buy_btn2" href="shopping_cart.html">カートへ移動</a>
        </div>
    </main>
    <footer>
        <small>&copy;2021 Ban</small>
    </footer>
</body>
</html>