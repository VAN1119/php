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
    <title>ユーザーTOP</title>
</head>
<body>
    <header>
        <h1>Electric Commerce store</h1>
    </header>
    <nav>
        <ul class="nav">
            <li><a href="shopping_favorite.php">お気に入り</a></li>
            <li>
                <form action="" method="post">
                    <input type="search" name="search" placeholder="アイテムを探す">
                    <input type="image" name="image" tabindex="1" value="検索">
                </form>
            </li>
        </ul>
    </nav>
    <main>
        <?php
        $filename = "../csv/items.csv";
        $lines = file($filename,FILE_IGNORE_NEW_LINES);
        $top_salse = array();
        $top = array();
        for ($i = 0; $i < 3; $i++) {
            $top_salse[$i] = 0;
        }
        // 大きい順ならいいけど、そうじゃない場合はMAXを探す方法にしないとダメ、なんか違う。また後日1/4
        for ($j = 0; $j < count($lines); $j++) {
            $array = explode(",", $lines[$j]);
            if ($top_salse[0] < $array[6]) {
                $top_salse[1] = $top_salse[0];
                $top_salse[0] = $array[6];
                $top[0] = $array[2];
            } else if ($top_salse[1] < $array[6]) {
                $top_salse[2] = $top_salse[1];
                $top_salse[1] = $array[6];
                $top[1] = $array[2];
            } else if ($top_salse[2] < $array[6]) {
                $top_salse[2] = $array[6];
                $top[2] = $array[2];
            }
        }
        ?>
        <div class="cover">
        <h2>売れ筋商品</h2>
        <a href="../shopping/shopping_detail.php"><img src="../images/<?php echo $top[0]; ?>" alt="" width="200px"></a>
        <a href="../shopping/shopping_detail.php"><img src="../images/<?php echo $top[1]; ?>" alt="" width="200px"></a>
        <a href="../shopping/shopping_detail.php"><img src="../images/<?php echo $top[2]; ?>" alt="" width="200px"></a>
        </div>
    </main>
    <footer>
        <small>&copy;2021 Ban</small>
    </footer>
</body>
</html>