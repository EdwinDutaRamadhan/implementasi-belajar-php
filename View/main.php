<?php
    require '../Function/function.php';

    $mahasiswa = query("SELECT * FROM tbl_mahasiswa");

    if( isset($_POST['search'])){
        $mahasiswa = cari($_POST['keywords']);
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
        
    <form action="" metod="post">
        <input type="text" name="keywords"placeholder="Search">
        <button type="submit" name="search">Cari</button>
    </form>

    <table border="1" cellspacing="0" cellpadding="10">
        <tr>
            <th>No.</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Vaksin - 1</th>
            <th>Vaksin - 2</th>
            <th>Booster - 1</th>
            <th>Booster - 2</th>
            <th>Booster - 3</th>
        </tr>
        <?php $i = 1; ?>
        <?php foreach ($mahasiswa as $row) : ?>
        <tr>
            <th><?= $i; ?></th>
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
</body>
</html>