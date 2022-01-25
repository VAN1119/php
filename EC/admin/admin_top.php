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
    <title>管理者TOP</title>
</head>
<body>
    <header>
        <h1>Electric Commerce store</h1>
        <a class="head_btn btn" href="admin_login.php">ログアウト</a>
    </header>
    <nav></nav>
    <main>
        <div class="cover">
            <h2>管理者トップ</h2>
        </div>
        <div class="buy_btn">
            <a class="admin_btn btn" href="../items/items_add.php">商品追加</a>
            <a class="admin_btn btn" href="../items/items_change.php">商品変更</a>
        </div>
        <div class="buy_btn">
            <a class="admin_btn btn" href="../items/items_delete.php">商品削除</a>
            <a class="admin_btn btn" href="../items/items_order.php">商品発注</a>
        </div>
        <div class="buy_btn">
            <a class="admin_btn btn" href="admin_register.php">管理者登録</a>
        </div>
    </main>
    <footer>
        <small>&copy;2021 Ban</small>
    </footer>
</body>
</html>