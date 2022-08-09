<?php
// 導入 連結資料庫檔案
require_once('config.php');

###########################
#########錯誤判斷###########
###########################


//判斷使用者是否直接輸入 register.php 的網址
// 利用判斷 $_POST['username']、$_POST['username'] 是否有這個資料傳送
// 如果沒有 可能是使用者直接輸入 register.php 的網址
if (!isset($_POST['username']) || !isset($_POST['username'])) {
	header("location: ./index.php?err=請輸入帳號或密碼"); // 導向註冊頁面
}

//防止使用者在註冊頁刪除js函數
if ($_POST['username']==="" || $_POST['pass']==="") {
header("location: ./index.php?err=請輸入帳號或密碼");
}

// 如果試用者輸入的密碼長度 不等於6 回傳
if (strlen($_POST['pass'])<6) {
	header("location: ./index.php?nomerr=密碼長度必需大於6");
}

###########################
#########註冊資料###########
###########################


// 取得 註冊資料
// 把註冊資料都設成變數
$acc=$_POST['username']; #使用者
$pass=$_POST['pass']; #密碼
//在註冊資料時判斷 使用者名稱是否有人使用
$selectsql = "SELECT * FROM user_test where mi_02='$acc'";
$result = mysqli_query($conn, $selectsql);
if (mysqli_num_rows($result) >= 1) {
	header("location: ./index.php?err=這個使用者名稱已被使用");
	exit();
}
// 把資料存進資料表
$insetsql = "INSERT INTO user_test (mi_01,mi_02,mi_03,mi_04)VALUES (NULL,'$acc','$pass',now())";

if (mysqli_query($conn, $insetsql)) {
  //註冊成功 
	header("location: ./index.php?okmsg=你已經註冊成功，可以到<a href='./login.php' title='前往登入頁面'>登入頁面</a> 登入了");
} else {
	header("location: ./index.php?err=註冊失敗，無法註冊，原因不明");
  
}

mysqli_close($conn);
	



// 
?>
