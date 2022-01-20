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
    <title>商品変更</title>
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
            <div class="admin_form">
                <form method="POST" action="">
                    <p><input type="number" name="edit" placeholder="編集番号" value=""></p>
                    <p><input type="text" name="i_name" placeholder="商品名" value=""></p>
                    <p><input type="text" name="i_pic" placeholder="商品画像" value=""></p>
                    <p><input type="text" name="i_comment" placeholder="商品説明" value=""></p>
                    <p><input type="number" name="i_price" placeholder="値段" value=""></p>
                    <p><input type="number" name="i_count" placeholder="在庫数" value=""></p>
                    <input type="submit" name="submit" value="編集">
                </form>
                <p class="ans">
                <?php
                $filename = "../csv/items.csv";
                $lines = file($filename,FILE_IGNORE_NEW_LINES);
                $date = date("Y年m月d日 H時i分s秒");
                if (isset($_POST["i_name"])) {
                    $i_name = $_POST["i_name"];
                }
                if (isset($_POST["i_pic"])) {
                    $i_pic = $_POST["i_pic"];
                }
                if (isset($_POST["i_comment"])) {
                    $i_comment = $_POST["i_comment"];
                }
                if (isset($_POST["i_price"])) {
                    $i_price = $_POST["i_price"];
                }
                if (isset($_POST["i_count"])) {
                    $i_count = $_POST["i_count"];
                }
                if (isset($_POST["edit"])) {
                    $edit = $_POST["edit"];
                }
                /* if (!empty($i_name) && !empty($i_comment) && !empty($i_price) && !empty($i_count) && empty($edit)) {
                    // 投稿番号取得
                    if(file_exists($filename)){
                        $lines = file($filename,FILE_IGNORE_NEW_LINES);
                        $i = count(file($filename)) + 1;
                        for ($k = 0; $k < count($lines); $k++) {
                            $line = explode(",", $lines[$k]);
                            if ($line[0] >= $i) {
                                $i = $line[0] + 1;
                            }
                        }
                    } else {
                        $i = 1001;
                    }
                    $fp = fopen($filename, "a");
                    fwrite($fp, $i.",".$i_name.",".$i_comment.",".$i_price.",".$i_count.","."1".","."5".",".$date.PHP_EOL);
                    fclose($fp);
                    echo "商品追加しました。<br><br>";
                } else */
                if (!empty($i_name) || !empty($i_pic) || !empty($i_comment) || !empty($i_price) || !empty($i_count)) {
                    if (!empty($edit)) {
                        $flag = 0;
                        $lines = file($filename,FILE_IGNORE_NEW_LINES);
                        $fp = fopen($filename, "w");
                        for ($i = 0; $i < count($lines); $i++) {
                            $line = explode(",", $lines[$i]);
                            $enum = $line[0];
                            if ($enum != $edit){
                                fwrite($fp, $lines[$i].PHP_EOL);
                            } else {
                                if (!empty($i_name)) {
                                    $line[1] = $i_name;
                                }
                                if (!empty($i_pic)) {
                                    $line[2] = $i_pic;
                                }
                                if (!empty($i_comment)) {
                                    $line[3] = $i_comment;
                                }
                                if (!empty($i_price)) {
                                    $line[4] = $i_price;
                                }
                                if (!empty($i_count)) {
                                    $line[5] = $i_count;
                                }
                                fwrite($fp, $edit.",".$line[1].",".$line[2].",".$line[3].",".$line[4].",".$line[5].",".$line[6].","."5".",".$date.PHP_EOL);
                                $flag = 1;
                            }
                        }
                        fclose($fp);
                        if ($flag == 1) {
                            echo "商品変更しました。<br><br>";
                        } else {
                            echo "編集番号の商品がありませんでした。<br><br>";
                        }
                    } else {
                        echo "編集番号を入力してください。";
                    }
                }
                ?>
                </p>
            </div>
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