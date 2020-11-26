<?php
mb_internal_encoding("utf8");

session_start();

try{
    $pdo = new PDO("mysql:dbname=4each_practice;host=localhost;","root","");
} catch(PDOException $e) {
    die("<p>申し訳ございません。現在サーバーが込み合っており一時的にアクセスが出来ません。<br>しばらくしてから再度ログインしてください。</p><a href='http://localhost/mypage/login.php'>マイページへ</a>");
}

$stmt = $pdo->prepare("update login_mypage SET name = ?,mail = ?,password = ?,comments = ? where id = ?");

$stmt->bindValue(1,$_POST['name']);
$stmt->bindValue(2,$_POST['mail']);
$stmt->bindValue(3,$_POST['password']);
$stmt->bindValue(4,$_POST['comments']);
$stmt->bindValue(5,$_SESSION['id']);

$stmt->execute();

$stmt = $pdo->prepare("select * from login_mypage where id = ?");

$stmt->bindValue(1,$_SESSION['id']);

$stmt->execute();
$pdo = NULL;

while($row = $stmt->fetch()) {
    $_SESSION['id'] = $row['id'];
    $_SESSION['name'] = $row['name'];
    $_SESSION['mail'] = $row['mail'];
    $_SESSION['password'] = $row['password'];
    $_SESSION['picture'] = $row['picture'];
    $_SESSION['comments'] = $row['comments'];
}

header("Location:mypage.php");

?>
