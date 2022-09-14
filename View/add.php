<?php
    session_start();
    if($_SESSION["Validasi"] == false){
        header("Location: login.php");
    }
    if(!isset($_COOKIE["valid"])){
        header("Location: login.php");
        echo"
            <script>
                alert('Anda tidak aktif lebih dari 5 menit!');
            </script>
        ";
    }
    require '../Function/function.php';
    if( isset($_POST['tambah'])){
        //insert input data ke database
        if( tambah($_POST) > 0){
            echo "
                <script>
                    alert('data berhasil ditambah');
                    document.location.href = 'main.php';
                </script>
            ";
        }else{
            echo "
                <script>
                    alert('data gagal ditambah karena NIM sudah terdaftar');
                </script>
            ";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=2160, initial-scale=1.0">
    <title>Tambah Data</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../Style/add.css">
    <style>
        li{
            display : block;
            padding : 10px;
        }

    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col">
            <a href="main.php"style="float:left;">back</a>
            </div>
            <div class="col-6">
            <form action="" method = "post" class="form w3-container w3-card-4 w3-light-blue">
                <li>
                    <label for="nim">NIM : </label>
                    <input class="w3-input w3-border w3-round-large" type="text" name="nim" id="nim" autocomplete="off" required >
                </li>
                <li>
                    <label for="nama">Nama : </label>
                    <input class="w3-input w3-border w3-round-large" type="text" name="nama" id="nama" autocomplete="off" required>
                </li>
                <li>
                    <label for="vaksin-1">Vaksin - 1</label>
                    <select class="w3-select"  name="vaksin-1" id="vaksin-1">
                        <option value="-">Tidak pilih</option>
                        <option value="Sinovac">Sinovac</option>
                        <option value="Sputnik V">Sputnik V</option>
                        <option value="Novavax">Novavax</option>
                        <option value="Sinopharm">Sinopharm</option>
                        <option value="Moderna">Moderna</option>
                        <option value="Pfizer-BioNTech">Pfizer</option>
                        <option value="Oxford-Astrazeneca">Astrazeneca</option>
                    </select>
                </li>
                <li>
                    <label for="vaksin-2">Vaksin - 2</label>
                    <select class="w3-select" name="vaksin-2" id="vaksin-2">
                        <option value="-">Tidak pilih</option>
                        <option value="Sinovac">Sinovac</option>
                        <option value="Sputnik V">Sputnik V</option>
                        <option value="Novavax">Novavax</option>
                        <option value="Sinopharm">Sinopharm</option>
                        <option value="Moderna">Moderna</option>
                        <option value="Pfizer-BioNTech">Pfizer</option>
                        <option value="Oxford-Astrazeneca">Astrazeneca</option>
                        
                    </select>
                </li>

                <li>
                    <label for="vaksin-3">Vaksin - 3</label>
                    <select class="w3-select" name="vaksin-3" id="vaksin-3">
                        <option value="-">Tidak pilih</option>
                        <option value="Sinovac">Sinovac</option>
                        <option value="Sputnik V">Sputnik V</option>
                        <option value="Novavax">Novavax</option>
                        <option value="Sinopharm">Sinopharm</option>
                        <option value="Moderna">Moderna</option>
                        <option value="Pfizer-BioNTech">Pfizer</option>
                        <option value="Oxford-Astrazeneca">Astrazeneca</option>
                    </select>
                </li>

                <li>
                    <label for="vaksin-4">Vaksin - 4</label>
                    <select class="w3-select" name="vaksin-4" id="vaksin-4">
                        <option value="-">Tidak pilih</option>
                        <option value="Sinovac">Sinovac</option>
                        <option value="Sputnik V">Sputnik V</option>
                        <option value="Novavax">Novavax</option>
                        <option value="Sinopharm">Sinopharm</option>
                        <option value="Moderna">Moderna</option>
                        <option value="Pfizer-BioNTech">Pfizer</option>
                        <option value="Oxford-Astrazeneca">Astrazeneca</option>
                    </select>
                </li>

                <li>
                    <label for="vaksin-5">Vaksin - 5</label>
                    <select class="w3-select" name="vaksin-5" id="vaksin-5">
                        <option value="-">Tidak pilih</option>
                        <option value="Sinovac">Sinovac</option>
                        <option value="Sputnik V">Sputnik V</option>
                        <option value="Novavax">Novavax</option>
                        <option value="Sinopharm">Sinopharm</option>
                        <option value="Moderna">Moderna</option>
                        <option value="Pfizer-BioNTech">Pfizer</option>
                        <option value="Oxford-Astrazeneca">Astrazeneca</option>
                    </select>
                </li>

                <li>
                    <button class="w3-btn w3-teal" type="submit" name="tambah">Add</button>
                </li>
        </form>
        </div>
        <div class="col"></div>
    </div>
</body>
</html>