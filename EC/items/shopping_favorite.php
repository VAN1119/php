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
    <title>お気に入り</title>
</head>
<body>
    <header>
        <h1>Electric Commerce store</h1>
    </header>
    <nav>
        <ul class="nav">
            <a href="../user_top.html">トップ画面        </a>
            <a href="shopping_detail.html">商品詳細</a>
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
            <h2>お気に入り画面</h2>
            <div class="item_favorite">
                <div class="fitem_cover">
                    <a href="shopping_detail.html"><img class="" src="../../images/net_shop.png" alt="表示例" width="200px">
                    <p class="">アイテム名1</p></a>
                </div>
                <div class="fitem_cover">
                    <a href="shopping_detail.html"><img class="" src="../../images/toy_glass_dome.png" alt="表示例" width="200px">
                    <p class="">アイテム名2</p></a>
                </div>
                <div class="fitem_cover">
                    <a href="shopping_detail.html"><img class="" src="../../images/toy_kibori_kuma.png" alt="表示例" width="200px">
                    <p class="">アイテム名3</p></a>
                </div>
            </div>
        </div>
    </main>
    <footer>
        <small>&copy;2021 Ban</small>
    </footer>
</body>
</html>