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
            <a href="../user/user_top.php">トップ画面        </a>
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
            <h2>お気に入り画面</h2>
            <form action="" method="POST">
            <div class="item_favorite">
            <?php
            $filefavo = "../csv/favorite.csv";
            $flines = file($filefavo,FILE_IGNORE_NEW_LINES);
            $total = 0;
            if(count($flines) > 0){
                foreach($flines as $fline){
                    $array = explode(",", $fline);
                    ?>
                    <div class="favo">
                    <p><a href="detail/<?php echo $array[0] ?>.php"><img class="" src="../images/<?php echo $array[2]?>" alt="表示例" width="200px"></a></p>
                    <p>商品名:<?php echo $array[1]; ?><br>金額:<?php echo $array[4]; ?>円</p>
                    <input type="checkbox" name="delete[]" value="<?php echo $array[0]; ?>">
                    </div>
                    <?php
                }
                if (isset($_POST["delete"])) {
                    $delete = $_POST['delete'];
                }
                if (!empty($delete)) {
                    $fp = fopen($filefavo, "w");
                    for ($i = 0; $i <= count($delete); $i++) {
                        $array = explode(",", $flines[$i]);
                        if ($delete[0] != $array[0]) {
                            fwrite($fp, $flines[$i]);
                            echo "成功？";
                        } else {
                            echo "失敗";
                            echo $array[0];
                            echo $delete[0];
                        }
                    }
                    fclose($fp);
                }
                ?>
                </div>
                <input type="submit" value="削除">
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