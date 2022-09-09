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
    if(!isset($_GET["nim"])){
        header("Location: main.php");
    }
    require '../Function/function.php';
    $NIM= $_GET['nim'];
    $mahasiswa = query("SELECT * FROM tbl_mahasiswa WHERE NIM = $NIM")[0];
    setcookie('valid','true',time()+300);
    if( isset($_POST['ubah'])){
        //insert input data ke database
        if( ubah($_POST) > 0){
            echo "
                <script>
                    alert('data berhasil ditambah');
                    document.location.href = '../index.php';
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../Style/edit.css">
    <style>
        li{
            display : block;
            padding : 10px;
        }

    </style>
</head>
<body>
    <div class="container" style="width: 100%;">
        <div class="row">
            <div class="col-md-2">
            <a href="main.php">back</a>
            </div>
            <div class="col-md-8">
            <form action="" method = "post" class="form w3-container w3-card-4 w3-light-blue">
                    <li>
                        <label for="nim">NIM : </label>
                        <input class="w3-input w3-border w3-round-large" type="text" name="nim" id="nim" autocomplete="off" required value="<?= $mahasiswa['NIM']; ?>" ></input>
                    </li>
                    <li>
                        <label for="nama">Nama : </label>
                        <input class="w3-input w3-border w3-round-large" type="text" name="nama" id="nama" autocomplete="off" required value="<?= $mahasiswa['Nama']; ?>" ></input>
                    </li>
                    <li>
                        <label for="vaksin-1">Vaksin - 1 :</label>
                        <select class="w3-select" name="vaksin-1" id="vaksin-1" selected="Sinovac">
                            <option value="-" <?=$mahasiswa['Vaksin1'] == '-' ? ' selected="-"' : '';?> >Tidak pilih</option>
                            <option value="Sinovac" <?=$mahasiswa['Vaksin1'] == 'Sinovac' ? ' selected="Sinovac"' : '';?>>Sinovac</option>
                            <option value="Sputnik V" <?=$mahasiswa['Vaksin1'] == 'Sputnik V' ? ' selected="Sputnik"' : '';?> >Sputnik V</option>
                            <option value="Novavax" <?=$mahasiswa['Vaksin1'] == 'Novavax' ? ' selected="Novavax"' : '';?> >Novavax</option>
                            <option value="Sinopharm" <?=$mahasiswa['Vaksin1'] == 'Sinopharm' ? ' selected="Sinopharm"' : '';?> >Sinopharm</option>
                            <option value="Moderna" <?=$mahasiswa['Vaksin1'] == 'Moderna' ? ' selected="Moderna"' : '';?> >Moderna</option>
                            <option value="Pfizer-BioNTech" <?=$mahasiswa['Vaksin1'] == 'Pfizer-BioNTech' ? ' selected="Pfizer-BioNTech"' : '';?> >Pfizer</option>
                            <option value="Oxford-AstraZeneca" <?=$mahasiswa['Vaksin1'] == 'Oxford-AstraZeneca' ? ' selected="Oxford-AstraZeneca"' : '';?> >AstraZeneca</option>
                        </select>
                    </li>
                    <li>
                        <label for="vaksin-2">Vaksin - 2 :</label>
                        <select class="w3-select" name="vaksin-2" id="vaksin-2">
                            <option value="-" <?=$mahasiswa['Vaksin2'] == '-' ? ' selected="-"' : '';?> >Tidak pilih</option>
                            <option value="Sinovac" <?=$mahasiswa['Vaksin2'] == 'Sinovac' ? ' selected="Sinovac"' : '';?>>Sinovac</option>
                            <option value="Sputnik V" <?=$mahasiswa['Vaksin2'] == 'Sputnik V' ? ' selected="Sputnik"' : '';?> >Sputnik V</option>
                            <option value="Novavax" <?=$mahasiswa['Vaksin2'] == 'Novavax' ? ' selected="Novavax"' : '';?> >Novavax</option>
                            <option value="Sinopharm" <?=$mahasiswa['Vaksin2'] == 'Sinopharm' ? ' selected="Sinopharm"' : '';?> >Sinopharm</option>
                            <option value="Moderna" <?=$mahasiswa['Vaksin2'] == 'Moderna' ? ' selected="Moderna"' : '';?> >Moderna</option>
                            <option value="Pfizer-BioNTech" <?=$mahasiswa['Vaksin2'] == 'Pfizer-BioNTech' ? ' selected="Pfizer-BioNTech"' : '';?> >Pfizer</option>
                            <option value="Oxford-AstraZeneca" <?=$mahasiswa['Vaksin2'] == 'Oxford-AstraZeneca' ? ' selected="Oxford-AstraZeneca"' : '';?> >AstraZeneca</option>
                            
                        </select>
                    </li>

                    <li>
                        <label for="vaksin-3">Booster - 1 :</label>
                        <select class="w3-select" name="vaksin-3" id="vaksin-3">
                            <option value="-" <?=$mahasiswa['Vaksin3'] == '-' ? ' selected="-"' : '';?> >Tidak pilih</option>
                            <option value="Sinovac" <?=$mahasiswa['Vaksin3'] == 'Sinovac' ? ' selected="Sinovac"' : '';?>>Sinovac</option>
                            <option value="Sputnik V" <?=$mahasiswa['Vaksin3'] == 'Sputnik V' ? ' selected="Sputnik"' : '';?> >Sputnik V</option>
                            <option value="Novavax" <?=$mahasiswa['Vaksin3'] == 'Novavax' ? ' selected="Novavax"' : '';?> >Novavax</option>
                            <option value="Sinopharm" <?=$mahasiswa['Vaksin3'] == 'Sinopharm' ? ' selected="Sinopharm"' : '';?> >Sinopharm</option>
                            <option value="Moderna" <?=$mahasiswa['Vaksin3'] == 'Moderna' ? ' selected="Moderna"' : '';?> >Moderna</option>
                            <option value="Pfizer-BioNTech" <?=$mahasiswa['Vaksin3'] == 'Pfizer-BioNTech' ? ' selected="Pfizer-BioNTech"' : '';?> >Pfizer</option>
                            <option value="Oxford-AstraZeneca" <?=$mahasiswa['Vaksin3'] == 'Oxford-AstraZeneca' ? ' selected="Oxford-AstraZeneca"' : '';?> >AstraZeneca</option>
                        </select>
                    </li>

                    <li>
                        <label for="vaksin-4">Booster - 2 :</label>
                        <select class="w3-select" name="vaksin-4" id="vaksin-4">
                            <option value="-" <?=$mahasiswa['Vaksin4'] == '-' ? ' selected="-"' : '';?> >Tidak pilih</option>
                            <option value="Sinovac" <?=$mahasiswa['Vaksin4'] == 'Sinovac' ? ' selected="Sinovac"' : '';?>>Sinovac</option>
                            <option value="Sputnik V" <?=$mahasiswa['Vaksin4'] == 'Sputnik V' ? ' selected="Sputnik"' : '';?> >Sputnik V</option>
                            <option value="Novavax" <?=$mahasiswa['Vaksin4'] == 'Novavax' ? ' selected="Novavax"' : '';?> >Novavax</option>
                            <option value="Sinopharm" <?=$mahasiswa['Vaksin4'] == 'Sinopharm' ? ' selected="Sinopharm"' : '';?> >Sinopharm</option>
                            <option value="Moderna" <?=$mahasiswa['Vaksin4'] == 'Moderna' ? ' selected="Moderna"' : '';?> >Moderna</option>
                            <option value="Pfizer-BioNTech" <?=$mahasiswa['Vaksin4'] == 'Pfizer-BioNTech' ? ' selected="Pfizer-BioNTech"' : '';?> >Pfizer</option>
                            <option value="Oxford-AstraZeneca" <?=$mahasiswa['Vaksin4'] == 'Oxford-AstraZeneca' ? ' selected="Oxford-AstraZeneca"' : '';?> >AstraZeneca</option>
                        </select>
                    </li>

                    <li>
                        <label for="vaksin-5">Booster - 3 :</label>
                        <select class="w3-select" name="vaksin-5" id="vaksin-5">
                            <option value="-" <?=$mahasiswa['Vaksin5'] == '-' ? ' selected="-"' : '';?> >Tidak pilih</option>
                            <option value="Sinovac" <?=$mahasiswa['Vaksin5'] == 'Sinovac' ? ' selected="Sinovac"' : '';?>>Sinovac</option>
                            <option value="Sputnik V" <?=$mahasiswa['Vaksin5'] == 'Sputnik V' ? ' selected="Sputnik"' : '';?> >Sputnik V</option>
                            <option value="Novavax" <?=$mahasiswa['Vaksin5'] == 'Novavax' ? ' selected="Novavax"' : '';?> >Novavax</option>
                            <option value="Sinopharm" <?=$mahasiswa['Vaksin5'] == 'Sinopharm' ? ' selected="Sinopharm"' : '';?> >Sinopharm</option>
                            <option value="Moderna" <?=$mahasiswa['Vaksin5'] == 'Moderna' ? ' selected="Moderna"' : '';?> >Moderna</option>
                            <option value="Pfizer-BioNTech" <?=$mahasiswa['Vaksin5'] == 'Pfizer-BioNTech' ? ' selected="Pfizer-BioNTech"' : '';?> >Pfizer</option>
                            <option value="Oxford-AstraZeneca" <?=$mahasiswa['Vaksin5'] == 'Oxford-AstraZeneca' ? ' selected="Oxford-AstraZeneca"' : '';?> >AstraZeneca</option>
                        </select>
                    </li>

                    <li>
                        <button class="w3-btn w3-teal" type="submit" name="tambah">Edit</button>
                    </li>
                
            </form>
            </div>
            <div class="col-md-2"></div>
        </div>    
    </div>
</body>
</html>