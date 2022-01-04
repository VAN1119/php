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
    <title>購入</title>
</head>
<body>
    <header>
        <h1>Electric Commerce store</h1>
    </header>
    <nav>
        <ul class="nav">
            <a href="../user/user_top.php">トップ画面</a>
            <li><a href="shopping_favorite.php">お気に入り</a></li>
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
            <h2>購入画面</h2>
            <?php
            $filename = "../csv/items.csv";
            $filecart = "../csv/cart.csv";
            $ilines = file($filename,FILE_IGNORE_NEW_LINES);
            $clines = file($filecart,FILE_IGNORE_NEW_LINES);
            $total = 0;
            $fpi = fopen($filename, "w");
            foreach ($clines as $cline) {
                $c_array = explode(",", $cline);
                echo "商品名:".$c_array[1]." 数量:".$c_array[9]." 単価:".$c_array[4]." 合計金額:".$c_array[9] * $c_array[4]."円<br>";
                $total += $c_array[9] * $c_array[4];
                $i = 0;
                foreach ($ilines as $iline) {
                    $i_array = explode(",", $iline);
                    // カート内商品番号とアイテム番号が一致した時に在庫を引いて、総売り上げを足す
                    if ($c_array[0] != $i_array[0]) {
                        fwrite($fpi, $ilines[$i].PHP_EOL);
                        $i++;
                    } else {
                        fwrite($fpi, $i_array[0].",".$i_array[1].",".$i_array[2].",".$i_array[3].",".$i_array[4].",".$i_array[5] - $c_array[9].",".$i_array[6] + $c_array[9].",".$i_array[7].",".$i_array[8].PHP_EOL);
                        $i++;
                    }
                }
            }
            fclose($fpi);
            $fpc = fopen($filecart, "w");
            fclose($fpc);
            if ($total > 0) {
                echo "<br>ご購入ありがとうございました。<br>";
            } else {
                echo "<br>商品を選択してください。<br>";
            }
            ?>
            <hr>
            <p class="total_price">購入金額:<?php echo $total; ?>円</p>
        </div>
    </main>
    <footer>
        <small>&copy;2021 Ban</small>
    </footer>
</body>
</html>