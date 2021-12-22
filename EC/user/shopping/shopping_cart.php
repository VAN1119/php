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
    <title>カート</title>
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
            <h2>カート画面</h2>
            <div class="item_cart">
                <div class="cart_cover">
                    <p class="">アイテム名1 金額円</p>
                </div>
                <div class="cart_cover">
                    <p class="">アイテム名2 金額円</p>
                </div>
                <div class="cart_cover">
                    <p class="">アイテム名3 金額円</p>
                </div>
            </div>
            <hr>
            <p class="total_price">合計金額</p>
            <div class="btn">
                <a class="start_btn" href="shopping_buy.html">購入</a>
            </div>
        </div>
    </main>
    <footer>
        <small>&copy;2021 Ban</small>
    </footer>
</body>
</html>