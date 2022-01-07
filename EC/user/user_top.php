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
            <li><a href="../shopping/shopping_favorite.php">お気に入り</a></li>
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
        $max1 = array();
        $max2 = array();
        $max3 = array();
        for ($i = 0; $i < 3; $i++) {
            $top_salse[$i] = 0;
        }
        // 大きい順ならいいけど、そうじゃない場合はMAXを探す方法にしないとダメ、なんか違う。また後日1/7
        foreach ($lines as $line) {
            $array = explode(",", $line);
            $max1[] = $array[6];
            echo $array[6].",";
        }
        $top[0][0] = max(array_keys($max1)) - 1;
        echo $top[0][0]."です";
        for ($j = 0; $j < count($lines); $j++) {
            $array = explode(",", $lines[$j]);
            if ($j == $top[0][0]) {
                $max2[] = 0;
            } else {
                $max2[] = $array[6];
            }
            echo $max2[$j].",";
        }
        foreach ($max2 as $m) {
            echo $m;
        }
        $top[1][0] = max(array_keys($max2)) - 1;
        echo $top[1][0]."です";
        for ($k = 0; $k < count($lines); $k++) {
            $array = explode(",", $lines[$k]);
            if ($k == $top[0][0] || $k == $top[1][0]) {
                $max3[] = 0;
            } else {
                $max3[] = $array[6];
            }
            echo $array[6].",";
        }
        $top[2][0] = max(array_keys($max3)) - 1;
        echo $top[2][0]."です";
        // 1番目に売上が大きい商品番号
        $array = explode(",",$lines[$top[0][0]]);
        $top[0][1] = $array[0];
        $top[0][2] = $array[2];
        // 2番目に売上が大きい商品番号
        $array = explode(",",$lines[$top[1][0]]);
        $top[1][1] = $array[0];
        $top[1][2] = $array[2];
        // 3番目に売上が大きい商品番号
        $array = explode(",",$lines[$top[2][0]]);
        $top[2][1] = $array[0];
        $top[2][2] = $array[2];
        /*
        for ($j = 0; $j < count($lines); $j++) {
            $array = explode(",", $lines[$j]);
            if ($top_salse[0] < $array[6]) {
                $top_salse[1] = $top_salse[0];
                $top_salse[0] = $array[6];
                $top[0][0] = $array[0];
                $top[0][1] = $array[2];
            } else if ($top_salse[1] < $array[6]) {
                $top_salse[2] = $top_salse[1];
                $top_salse[1] = $array[6];
                $top[1][0] = $array[0];
                $top[1][1] = $array[2];
            } else if ($top_salse[2] < $array[6]) {
                $top_salse[2] = $array[6];
                $top[2][0] = $array[0];
                $top[2][1] = $array[2];
            }
        } */
        ?>
        <div class="cover">
        <h2>売れ筋商品</h2>
        <a href="../shopping/detail/<?php echo $top[0][1] ?>.php"><img src="../images/<?php echo $top[0][2]; ?>" alt="" width="200px"></a>
        <a href="../shopping/detail/<?php echo $top[1][1] ?>.php"><img src="../images/<?php echo $top[1][2]; ?>" alt="" width="200px"></a>
        <a href="../shopping/detail/<?php echo $top[2][1] ?>.php"><img src="../images/<?php echo $top[2][2]; ?>" alt="" width="200px"></a>
        </div>
    </main>
    <footer>
        <small>&copy;2021 Ban</small>
    </footer>
</body>
</html>