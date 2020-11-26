<?php
mb_internal_encoding("utf8");

session_start();

if(empty($_POST['from_mypage'])) {
    header("Location:login_error.php");
}


?>

<!DOCTYPE HTML>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>マイページ編集</title>
        <link rel="stylesheet" type="text/css" href="mypage_hensyu.css">
    </head>
    <body>
    <header>
        <img src="4eachblog_logo.jpg">
        <div class="log_out"><a href="log_out.php">ログアウト</a></div>
    </header>
    
    <main>
        <form action="mypage_update.php" method="post">
            <div class="box">
                <h2>会員情報</h2>
                <div class="hello">
                    <p>こんにちは！<?php echo $_SESSION['name'];?>さん</p>
                </div>
                <div class="profile_pic">
                    <img src="<?php echo $_SESSION['picture'];?>">
                </div>
                <div class="info">
                    <p>
                        氏名：<input type="text" name="name" class="formbox" size="40" value="<?php echo $_SESSION['name'];?>">
                    </p>
                    <p>
                        メール：<input type="text" name="mail" class="formbox" size="40" pattern="^[a-z0-9._%+-]+@[a-x0-9.-]+\.[a-z]{2,3}$" value="<?php echo $_SESSION['mail'];?>">
                    </p>
                    <p>
                        パスワード：<input type="text" name="password" class="formbox" size="40" pattern="^[a-zA-Z0-9]{6,}$" value="<?php echo $_SESSION['password'];?>">
                    </p>
                </div>
                <div class="comments">
                    <textarea rows="2" cols="80" name="comments" placeholder="<?php echo $_SESSION['comments'];?>"></textarea>
                </div>
                <div class="btn">
                    <input type="submit" class="submit_btn" size="35" value="この内容に変更する">
                </div>
            </div>
        </form>
    </main>
    <footer>
        © 2018 InterNous.inc. All rights reserved
    </footer>
    </body>
</html>