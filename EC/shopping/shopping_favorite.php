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
            <div class="left_nav">
                <li><a class="nav_btn" href="../user/user_top.php">トップ画面</a></li>
                <li><a class="nav_btn" href="shopping_favorite.php">お気に入り</a></li>
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
        </ul>
    </nav>
    <main>
        <div class="cover">
            <h2>お気に入り商品</h2>
            <form action="" method="POST">
            <div class="item_favorite">
            <?php
            $filefavo = "../csv/favorite.csv";
            $flines = file($filefavo,FILE_IGNORE_NEW_LINES);
            if(count($flines) > 0){
                foreach($flines as $fline){
                    $array = explode(",", $fline);
                    ?>
                    <div class="favo">
                        <p><a href="detail/<?php echo $array[0] ?>.php"><img class="" src="../images/<?php echo $array[2]?>.png" alt="表示例" width="200px"></a></p>
                        <p>商品名:<?php echo $array[1]; ?><br>金額:<?php echo $array[4]; ?>円</p>
                        <input type="checkbox" name="delete[]" value="<?php echo $array[0]; ?>">
                    </div>
                    <?php
                }
                if (isset($_POST["delete"])) {
                    $delete = $_POST['delete'];
                }
                // deleteが$kの時にファイル分を確認する方法
                if (!empty($delete)) {
                    $fp = fopen($filefavo, "w");
                    $k = 0;
                    foreach ($flines as $fline) {
                        $darray = explode(",", $fline);
                        $flag = 0;
                        foreach ($delete as $dele) {
                            if ($dele == $darray[0]) {
                                $flag = 1;
                            }
                        }
                        if ($flag == 0) {
                            fwrite($fp, $flines[$k].PHP_EOL);
                            $k++;
                        } else {
                            $k++;
                        }
                    }
                    fclose($fp);
                    header("Location:#");
                }
                ?>
                </div>
                <input class="delete_btn" type="submit" value="削除">
                <?php
            } else {
                echo "お気に入りに登録している商品はありません";
            }
            ?>
        </div>
    </main>
    <footer>
        <small>&copy;2021 Ban</small>
    </footer>
</body>
</html>