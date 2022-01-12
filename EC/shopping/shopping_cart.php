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
    <title>カート</title>
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
                    <input type="search" name="search" placeholder="アイテムを探す">
                    <input type="image" src="../images/search_mushimegane.png" width="25px"name="image" tabindex="1" value="検索">
                </form>
                <?php
                if (isset($_POST["search"])) {
                    $searc = $_POST['search'];
                    $search = '/'.$searc.'/';
                }
                if (!empty($search)) {
                    $fileitems = "../csv/items.csv";
                    $ilines = file($fileitems,FILE_IGNORE_NEW_LINES);
                    $filesearch = "../csv/search.csv";
                    $sfp = fopen($filesearch, "w");
                    $sflag = 0;
                    foreach ($ilines as $iline) {
                        $iarray = explode(",", $iline);
                        if (preg_match($search, $iarray[1]) || preg_match($search, $iarray[3])) {
                            fwrite($sfp, $iline.PHP_EOL);
                            $sflag = 1;
                        }
                    }
                    if ($sflag == 1) {
                        header("Location:shopping_search.php");
                    } else {
                        header("Location:shopping_search.php");
                    }
                    fclose($sfp);
                }
                ?>
            </li>
        </ul>
    </nav>
    <main>
        <div class="cover">
            <h2>カート画面</h2>
            <?php
            $filecart = "../csv/cart.csv";
            $total = 0;
            if(file_exists($filecart)){
                $clines = file($filecart,FILE_IGNORE_NEW_LINES);
                foreach($clines as $cline){
                    $array = explode(",", $cline);
                    echo "商品名:".$array[1]." 数量:".$array[9]." 単価:".$array[4]." 合計金額:".$array[9] * $array[4]."円<br>";
                    $total += $array[9] * $array[4];
                }
            }
            ?>
            <hr>
            <p class="total_price">合計金額:<?php echo $total ?>円</p>
            <div class="btn">
                <a class="start_btn" href="shopping_buy.php">購入</a>
            </div>
        </div>
    </main>
    <footer>
        <small>&copy;2021 Ban</small>
    </footer>
</body>
</html>