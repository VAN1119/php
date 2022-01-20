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
    <title>ユーザーログイン</title>
</head>
<body>
    <header>
        <h1>Electric Commerce store</h1>
        <a class="head_btn" href="../index.php">TOP</a>
    </header>
    <nav>
    </nav>
    <main>
        <div class="cover">
            <h2>ログイン</h2>
            <form method="POST" action="">
                <div class="login">
                    <p><input type="text" name="id" placeholder="ID" value=""></p>
                    <p><input type="password" name="pass" placeholder="PASSWORD" value=""></p>
                    <input type="submit" name="submit" value="ログイン">
                </div>
            </form>
            <div class="ligin_b">
                <hr width="300px">
                <p>初めての方はこちら</p>
                <p><a href="user_register.php">アカウント新規登録</a></p>
            </div>
        </div>
        <p class="ans">
            <?php
            if (isset($_POST["id"])) {
                $id = $_POST["id"];
            }
            if (isset($_POST["pass"])) {
                $pass = $_POST["pass"];
            }
            if (!empty($id) && !empty($pass)) {
                $filename = "../csv/user.csv";
                $lines = file($filename, FILE_IGNORE_NEW_LINES);
                foreach ($lines as $line) {
                    $users = explode(",", $line);
                    if ($users[0] == $id && $users[1] == $pass) {
                        header("Location:user_top.php");
                    }
                }
                echo "<br>IDまたはPASSWORD、<br>もしくはその両方が間違っています";
            }
            ?>
        </p>
    </main>
    <footer>
        <small>&copy;2021 Ban</small>
    </footer>
</body>
</html>