<?php
###########################
######是否已經登入判斷######
###########################


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

    <title>登入製作</title>
</head>

<body>

    <form id="form" onsubmit="return chick()" action="./register.php" method="POST">
            <br>
            
            <?php 
            // 如果有取得 err這個變數，那就是使用者在註冊時有輸入上的錯誤
            if (isset($_GET['err'])) {
            echo "<div>";
            echo $_GET['err']; 
            echo "<div>";
                // exit();
            }
            ?>
            <?php
            if (isset($_GET['okmsg'])) {
            echo "<div class='okmsg'>";
            echo $_GET['okmsg']; 
            echo "<div>";
                // exit();
            }

            ?>    

            
        <div>

            <span>帳號:</span>
            <input type="text" name="username" placeholder="帳號">
        </div>
            <br>

        <div>
            <span>密碼:</span>
            <input type="password" name="pass" placeholder="密碼">
        </div>
                    <?php 
            // 如果有取得 nomerr這個變數，那就是使用者在註冊時有輸入上的錯誤
            if (isset($_GET['nomerr'])) {
            echo "<div>";
            echo $_GET['nomerr']; 
            echo "<div>";
                // exit();
            }
            ?>
            <br>

        <button type="submit" class="btn btn-success" name="btu">註冊</button>
    </form>

    <script>
        function chick() {
            let acc = document.forms["form"]["username"].value;
            let pass = document.forms["form"]["pass"].value;
            if (acc == "") {
                // alert("請輸入 帳號");
                Swal.fire(
                    '請輸入帳號',
                    '帳號不得為空',
                    'error'
                );
                console.log("未輸入帳號");
                return false;


            }
            if (pass == "") {
                // alert("請輸入 密碼");
                console.log("未輸入密碼");
                Swal.fire(
                    '請輸入密碼',
                    '密碼不得為空',
                    'error'
                );
                return false;

            }
            if (acc !== "" && pass !== "") {
                return true;
            }
        }
    </script>
</body>

</html>