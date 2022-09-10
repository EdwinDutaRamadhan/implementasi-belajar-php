<?php
    session_start();
    require '../Function/function.php';
    if( isset($_POST['login']) ){
        //JANGAN DI PUSH KE SERER
        $username = $_POST["username"];
        $password = $_POST["password"];
        $username = strtoupper(sha1($username));
        $username = 'KBM'.$username.'PEDES';
        var_dump($username);
        $password = strtoupper(sha1($password));
        $password = 'KBM'.$password.'PEDES';
        var_dump($password);
        $result = mysqli_query($conn, "SELECT * FROM tbl_admin WHERE Username = '$username'");
        //cek username
        if( mysqli_num_rows($result) == 1 ){
            //cek password di database
            $row = mysqli_fetch_assoc($result);
            if( $password == $row['Password'] ){
                //username password benar
                //set session
                $_SESSION["Validasi"] = true;
                setcookie('valid','true',time()+300);
                header("Location: main.php");
                exit;
            }
        }
        $error = true;
        //JANGAN DI PUSH KE SEVER
        /*
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
                setcookie('valid','true',time()+300);
                header("Location: main.php");
                exit;
            }
        }
        $error = true;
        */
        
    }
    if(isset($_POST["guest"])){
        header("Location: guest.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../Style/login.css">
    <title>Login Form</title>
</head>
<body>
    <?php
        if( isset($error) ){
            echo"
                <script>
                    alert('username atau password salah');
                </script>
            ";
        }
    ?>
    <div class="container">
        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-8">
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
                <div class="container">
                    <div class="row">
                    <div class="col-sm" style="max-height:55px;">
                        <button type="submit" name="login" class="button" style="vertical-align:middle;">
                        <span>Login</span>
                        </button>   
                    </div>
                        
                    </div>
                </div>
            </a>
            </form>
        </div>
            </div>
            <div class="col-sm-2">
                <a href="guest.php" style="float:right;">Guest</a>
            </div>
        </div>
    </div>
</body>
</html>