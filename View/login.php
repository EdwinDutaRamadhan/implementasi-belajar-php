<?php
    session_start();
    require '../Function/function.php';
    if( isset($_POST['login']) ){

        $username = $_POST["username"];
        $password = $_POST["password"];
        $result = mysqli_query($conn, "SELECT * FROM tbl_admin WHERE Username = '$username'");
        //cek username
        if( mysqli_num_rows($result) == 1 ){
            //cek password di database
            $row = mysqli_fetch_assoc($result);
            if( $password == $row['Password'] ){
                //username password benar
                //set session
                $_SESSION["Validasi"] = true;
                header("Location: main.php");
                exit;
            }
        }else{
            $error = true;
        }
        
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Style/style.css">
    <title>Login Form</title>
</head>
<body>
    <?php
        if( isset($error) ){
            echo"
                <script>
                    alert('login gagal');
                </script>
            ";
        }
    ?>
    <div class="login-box">
        <h2>Login</h2>
        <form action="" method="post" >
            <div class="user-box">
                <input type="text" id="usernameTextBox username" name="username" autocomplete="off" required="">
                <label>Username</label>
            </div>
            <div class="user-box">
                <input type="password" id="passwordTextBox password" name="password" required="">
                <label>Password</label>
            </div>
            <button type="submit" name="login" class="button" style="vertical-align:middle">
            <span>Login</span>
            </button>
          </a>
        </form>
      </div>
</body>
</html>