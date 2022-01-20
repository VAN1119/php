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
    <title>商品削除</title>
</head>
<body>
    <header>
        <h1>Electric Commerce store</h1>
        <a class="head_btn" href="../admin/admin_login.php">ログアウト</a>
    </header>
    <nav>
        <div class="buy_btn">
            <a class="admin_top_btn" href="../admin/admin_top.php">管理トップ</a>
        </div>
    </nav>
    <main>
        <div class="items_cover">
            <form method="POST" action="">
                <div class="admin_form">
                    <p><input type="number" name="delete" placeholder="削除番号" value=""></p>
                    <input type="submit" name="submit" value="削除">
                </div>
                <p class="ans">
                <?php
                $delete = "";
                $filename = "../csv/items.csv";
                $lines = file($filename,FILE_IGNORE_NEW_LINES);
                if (isset($_POST["delete"])) {
                    $delete = $_POST["delete"];
                }
                if (!empty($delete)) {
                    $flag = 0;
                    $lines = file($filename,FILE_IGNORE_NEW_LINES);
                    $fp = fopen($filename, "w");
                    for ($k = 0; $k < count($lines); $k++) {
                        $line = explode(",", $lines[$k]);
                        $dnum = $line[0];
                        if ($dnum != $delete){
                            fwrite($fp, $lines[$k].PHP_EOL);
                        } else {
                            $flag = 1;
                        }
                    }
                    fclose($fp);
                    if ($flag == 1) {
                        echo "商品削除しました。<br><br>";
                    } else {
                        echo "削除番号の対象がありません。<br><br>";
                    }
                }
                ?>
                </p>
            </form>
            <div class="item_info">
            <?php
            if(file_exists($filename)){
                $lines = file($filename,FILE_IGNORE_NEW_LINES);
                foreach($lines as $line){
                    $array = explode(",", $line);
                    echo "番号:".$array[0]." 品名:".$array[1]." 画像:".$array[2]."<br>説明:".$array[3]." 金額:".$array[4]." 在庫:".$array[5]."<br><br>";
                }
            }
            ?>
            </div>
        </div>
    </main>
    <footer>
        <small>&copy;2021 Ban</small>
    </footer>
</body>
</html>