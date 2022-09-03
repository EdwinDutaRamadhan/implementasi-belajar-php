<?php
    session_start();
    if($_SESSION["Validasi"] == false){
        header("Location: login.php");
    }
    if($_GET["nim"] == ''){
        header("Location: main.php");
    }
    require '../Function/function.php';
    $NIM = $_GET['nim'];
    
    if( hapus($NIM) > 0){
        echo "
                <script>
                    alert('data berhasil dihapus!');
                    document.location.href = 'main.php';
                </script>
            ";
    } else{
        echo "
                <script>
                    alert('data gagal dihapus!');
                    document.location.href = 'main.php';
                </script>
            ";
        
    }
?>