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
        <a class="head_btn btn" href="../user/user_login.php">ログアウト</a>
    </header>
    <nav>
        <ul class="nav">
            <div class="left_nav">
                <li><a class="nav_btn btn" href="../user/user_top.php">トップ画面</a></li>
                <li><a class="nav_btn btn" href="shopping_favorite.php">お気に入り</a></li>
            </div>
            <div class="right_nav">
                <li>
                    <form action="" method="post">
                        <input class="right_input" type="search" name="search" placeholder="アイテムを探す">
                        <input class="right_input" type="submit" name="" value="検索">
                    </form>
                </li>
            </div>
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
                foreach ($ilines as $iline) {
                    $iarray = explode(",", $iline);
                    if (preg_match($search, $iarray[1]) || preg_match($search, $iarray[3])) {
                        fwrite($sfp, $iline.PHP_EOL);
                    }
                }
                fclose($sfp);
                header("Location:shopping_search.php");
            }
            ?>  
        </ul>
    </nav>
    <main>
        <div class="cover">
            <h2>カート画面</h2>
            <!-- ここからお気に入り画面の流用-->
            <form action="" method="POST">
            <div class="item_favorite">
                <?php
                $filecart = "../csv/cart.csv";
                $total = 0;
                $clines = file($filecart,FILE_IGNORE_NEW_LINES);
                if(count($clines) > 0){
                    foreach($clines as $cline){
                        $array = explode(",", $cline);
                        ?>
                        <div class="cart_item">
                            <p><a href="detail/<?php echo $array[0]?>.php"><img class="" src="../images/<?php echo $array[2]?>.png" alt="表示例" width="100px"></a></p>
                            <p>商品名:<?php echo $array[1]?><br>金額:<?php echo $array[4]?>円 数量:<?php echo $array[9]?></p>
                            <hr>
                            <p>合計金額:<?php echo $array[4] * $array[9]?>円</p>
                            <input type="checkbox" name="delete[]" value="<?php echo $cline; ?>">削除
                        </div>
                        <?php
                        $total += $array[4] * $array[9];
                    }
                    if (isset($_POST["delete"])) {
                        $delete = $_POST['delete'];
                    }
                    // deleteが$kの時にファイル分を確認する方法
                    if (!empty($delete)) {
                        $fp = fopen($filecart, "w");
                        $k = 0;
                        foreach ($clines as $cline) {
                            $darray = explode(",", $cline);
                            $flag = 0;
                            foreach ($delete as $dele) {
                                if ($dele == $cline) {
                                    $flag = 1;
                                }
                            }
                            if ($flag == 0) {
                                fwrite($fp, $clines[$k].PHP_EOL);
                                $k++;
                            } else {
                                $k++;
                            }
                        }
                        fclose($fp);
                        header("Location:shopping_cart.php");
                    }
                    ?>
                    </div>
                    <input class="delete_btn btn" type="submit" value="削除">
                    <?php
                } else {
                    echo "カートに商品はありません";
                }
                ?>
            </div>
            <hr>
            <p class="total_price">合計金額:<?php echo $total ?>円</p>
        </div>
        <a class="cart_btn btn" href="shopping_buy.php">購入</a>
    </main>
    <footer>
        <small>&copy;2021 Ban</small>
    </footer>
</body>
</html>