<?php
    require '../Function/function.php';
    $mahasiswa = query("SELECT * FROM tbl_mahasiswa LIMIT 10");
    $i = 1;
    if( isset($_POST['cari'])){
        // $mahasiswa = cari($_POST['keywords']);
        $mahasiswa = cari($_POST['keywords']);    
    }
    if( isset($_POST['next'])){
        switch($_POST['next']){
            case 1 :
                $i = 1;
                $mahasiswa = query("SELECT * FROM tbl_mahasiswa LIMIT 10");
            break;
            case 2 :
                $i = 11;
                $mahasiswa = query("SELECT * FROM tbl_mahasiswa LIMIT 10 OFFSET 11");
            break;
            case 3 :
                $i = 21;
                $mahasiswa = query("SELECT * FROM tbl_mahasiswa LIMIT 10 OFFSET 21");
            break;
            case 4 :
                $i = 31;
                $mahasiswa = query("SELECT * FROM tbl_mahasiswa LIMIT 10 OFFSET 31");
            break;
            default :
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main</title>

</head>
<body>
    <h1 text-align="center">Medical Assist Software</h1>
    <br>
    <a href="add.php">Tambah data</a>
    <form action="" method="post">
        <input type="text" name="keywords"placeholder="Search">
        <button type="submit" name="cari">Cari</button>
    </form>

    <table border="1" cellspacing="0" cellpadding="10">
        <tr>
            <th>No.</th>
            <th>Action</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Vaksin - 1</th>
            <th>Vaksin - 2</th>
            <th>Booster - 1</th>
            <th>Booster - 2</th>
            <th>Booster - 3</th>
        </tr>
        <?php foreach ($mahasiswa as $row) : ?>
        <tr>
            <th><?= $i; ?></th>
            <td>
                <a href="edit.php?nim=<?= $row["NIM"]?>">Edit</a>|
                <a href="delete.php">Delete</a>
            </td>
            <td><?= $row["NIM"]; ?></td>
            <td><?= $row["Nama"];?></td>
            <td><?= $row["Vaksin1"];?></td>
            <td><?= $row["Vaksin2"];?></td>
            <td><?= $row["Vaksin3"];?></td>
            <td><?= $row["Vaksin4"];?></td>
            <td><?= $row["Vaksin5"];?></td>
        </tr>
        <?php $i++; ?>
        <?php endforeach; ?>
    </table>
        <form action="" method = "post">
            <button type="submit" name="next" value="1" >1</button>
            <button type="submit" name="next" value="2">2</button>
            <button type="submit" name="next" value="3">3</button>
            <button type="submit" name="next" value="4">4</button>
            <button type = "submit" name = "next-page" >next</button>
        </form>
</body>
</html>