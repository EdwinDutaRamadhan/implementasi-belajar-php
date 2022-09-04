<?php
    session_start();
    if($_SESSION["Validasi"] == false){
        header("Location: login.php");
    }
    if($_GET["nim"] == ''){
        header("Location: main.php");
    }
    require '../Function/function.php';
    $NIM= $_GET['nim'];
    $mahasiswa = query("SELECT * FROM tbl_mahasiswa WHERE NIM = $NIM")[0];

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
    <style>
        li{
            display : block;
            padding : 10px;
        }

    </style>
</head>
<body>
    <h1>Edit Data</h1>
    <br>
    <a href="main.php">back</a>
    <form action="" method = "post">
        <ul>
            <li>
                <label for="nim">NIM</label>
                <input type="text" name="nim" id="nim" autocomplete="off" required value="<?= $mahasiswa['NIM']; ?>" ></input>
            </li>
            <li>
                <label for="nama">Nama</label>
                <input type="text" name="nama" id="nama" autocomplete="off" required value="<?= $mahasiswa['Nama']; ?>" ></input>
            </li>
            <li>
                <label for="vaksin-1">Vaksin - 1</label>
                <select name="vaksin-1" id="vaksin-1" selected="Sinovac">
                    <option value="-" <?=$mahasiswa['Vaksin1'] == '-' ? ' selected="-"' : '';?> >Tidak pilih</option>
                    <option value="Sinovac" <?=$mahasiswa['Vaksin1'] == 'Sinovac' ? ' selected="Sinovac"' : '';?>>Sinovac</option>
                    <option value="Sputnik V" <?=$mahasiswa['Vaksin1'] == 'Sputnik V' ? ' selected="Sputnik"' : '';?> >Sputnik V</option>
                    <option value="Novavax" <?=$mahasiswa['Vaksin1'] == 'Novavax' ? ' selected="Novavax"' : '';?> >Novavax</option>
                    <option value="Sinopharm" <?=$mahasiswa['Vaksin1'] == 'Sinopharm' ? ' selected="Sinopharm"' : '';?> >Sinopharm</option>
                    <option value="Moderna" <?=$mahasiswa['Vaksin1'] == 'Moderna' ? ' selected="Moderna"' : '';?> >Moderna</option>
                    <option value="Pfizer-BioNTech" <?=$mahasiswa['Vaksin1'] == 'Pfizer-BioNTech' ? ' selected="Pfizer-BioNTech"' : '';?> >Pfizer</option>
                    <option value="Oxford-Astrazeneca" <?=$mahasiswa['Vaksin1'] == 'Oxford-Astrazeneca' ? ' selected="Oxford-Astrazeneca"' : '';?> >Astrazeneca</option>
                </select>
            </li>
            <li>
                <label for="vaksin-2">Vaksin - 2</label>
                <select name="vaksin-2" id="vaksin-2">
                    <option value="-" <?=$mahasiswa['Vaksin2'] == '-' ? ' selected="-"' : '';?> >Tidak pilih</option>
                    <option value="Sinovac" <?=$mahasiswa['Vaksin2'] == 'Sinovac' ? ' selected="Sinovac"' : '';?>>Sinovac</option>
                    <option value="Sputnik V" <?=$mahasiswa['Vaksin2'] == 'Sputnik V' ? ' selected="Sputnik"' : '';?> >Sputnik V</option>
                    <option value="Novavax" <?=$mahasiswa['Vaksin2'] == 'Novavax' ? ' selected="Novavax"' : '';?> >Novavax</option>
                    <option value="Sinopharm" <?=$mahasiswa['Vaksin2'] == 'Sinopharm' ? ' selected="Sinopharm"' : '';?> >Sinopharm</option>
                    <option value="Moderna" <?=$mahasiswa['Vaksin2'] == 'Moderna' ? ' selected="Moderna"' : '';?> >Moderna</option>
                    <option value="Pfizer-BioNTech" <?=$mahasiswa['Vaksin2'] == 'Pfizer-BioNTech' ? ' selected="Pfizer-BioNTech"' : '';?> >Pfizer</option>
                    <option value="Oxford-Astrazeneca" <?=$mahasiswa['Vaksin2'] == 'Oxford-Astrazeneca' ? ' selected="Oxford-Astrazeneca"' : '';?> >Astrazeneca</option>
                    
                </select>
            </li>

            <li>
                <label for="vaksin-3">Vaksin - 3</label>
                <select name="vaksin-3" id="vaksin-3">
                    <option value="-" <?=$mahasiswa['Vaksin3'] == '-' ? ' selected="-"' : '';?> >Tidak pilih</option>
                    <option value="Sinovac" <?=$mahasiswa['Vaksin3'] == 'Sinovac' ? ' selected="Sinovac"' : '';?>>Sinovac</option>
                    <option value="Sputnik V" <?=$mahasiswa['Vaksin3'] == 'Sputnik V' ? ' selected="Sputnik"' : '';?> >Sputnik V</option>
                    <option value="Novavax" <?=$mahasiswa['Vaksin3'] == 'Novavax' ? ' selected="Novavax"' : '';?> >Novavax</option>
                    <option value="Sinopharm" <?=$mahasiswa['Vaksin3'] == 'Sinopharm' ? ' selected="Sinopharm"' : '';?> >Sinopharm</option>
                    <option value="Moderna" <?=$mahasiswa['Vaksin3'] == 'Moderna' ? ' selected="Moderna"' : '';?> >Moderna</option>
                    <option value="Pfizer-BioNTech" <?=$mahasiswa['Vaksin3'] == 'Pfizer-BioNTech' ? ' selected="Pfizer-BioNTech"' : '';?> >Pfizer</option>
                    <option value="Oxford-Astrazeneca" <?=$mahasiswa['Vaksin3'] == 'Oxford-Astrazeneca' ? ' selected="Oxford-Astrazeneca"' : '';?> >Astrazeneca</option>
                </select>
            </li>

            <li>
                <label for="vaksin-4">Vaksin - 4</label>
                <select name="vaksin-4" id="vaksin-4">
                    <option value="-" <?=$mahasiswa['Vaksin4'] == '-' ? ' selected="-"' : '';?> >Tidak pilih</option>
                    <option value="Sinovac" <?=$mahasiswa['Vaksin4'] == 'Sinovac' ? ' selected="Sinovac"' : '';?>>Sinovac</option>
                    <option value="Sputnik V" <?=$mahasiswa['Vaksin4'] == 'Sputnik V' ? ' selected="Sputnik"' : '';?> >Sputnik V</option>
                    <option value="Novavax" <?=$mahasiswa['Vaksin4'] == 'Novavax' ? ' selected="Novavax"' : '';?> >Novavax</option>
                    <option value="Sinopharm" <?=$mahasiswa['Vaksin4'] == 'Sinopharm' ? ' selected="Sinopharm"' : '';?> >Sinopharm</option>
                    <option value="Moderna" <?=$mahasiswa['Vaksin4'] == 'Moderna' ? ' selected="Moderna"' : '';?> >Moderna</option>
                    <option value="Pfizer-BioNTech" <?=$mahasiswa['Vaksin4'] == 'Pfizer-BioNTech' ? ' selected="Pfizer-BioNTech"' : '';?> >Pfizer</option>
                    <option value="Oxford-Astrazeneca" <?=$mahasiswa['Vaksin4'] == 'Oxford-Astrazeneca' ? ' selected="Oxford-Astrazeneca"' : '';?> >Astrazeneca</option>
                </select>
            </li>

            <li>
                <label for="vaksin-5">Vaksin - 5</label>
                <select name="vaksin-5" id="vaksin-5">
                    <option value="-" <?=$mahasiswa['Vaksin5'] == '-' ? ' selected="-"' : '';?> >Tidak pilih</option>
                    <option value="Sinovac" <?=$mahasiswa['Vaksin5'] == 'Sinovac' ? ' selected="Sinovac"' : '';?>>Sinovac</option>
                    <option value="Sputnik V" <?=$mahasiswa['Vaksin5'] == 'Sputnik V' ? ' selected="Sputnik"' : '';?> >Sputnik V</option>
                    <option value="Novavax" <?=$mahasiswa['Vaksin5'] == 'Novavax' ? ' selected="Novavax"' : '';?> >Novavax</option>
                    <option value="Sinopharm" <?=$mahasiswa['Vaksin5'] == 'Sinopharm' ? ' selected="Sinopharm"' : '';?> >Sinopharm</option>
                    <option value="Moderna" <?=$mahasiswa['Vaksin5'] == 'Moderna' ? ' selected="Moderna"' : '';?> >Moderna</option>
                    <option value="Pfizer-BioNTech" <?=$mahasiswa['Vaksin5'] == 'Pfizer-BioNTech' ? ' selected="Pfizer-BioNTech"' : '';?> >Pfizer</option>
                    <option value="Oxford-Astrazeneca" <?=$mahasiswa['Vaksin5'] == 'Oxford-Astrazeneca' ? ' selected="Oxford-Astrazeneca"' : '';?> >Astrazeneca</option>
                </select>
            </li>

            <li>
                <button type="submit" name="tambah">Add</button>
            </li>
        </ul>
    </form>
</body>
</html>