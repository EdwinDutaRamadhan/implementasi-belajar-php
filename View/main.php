<?php
    session_start();
    require '../Function/function.php';
    if($_SESSION["Validasi"] == false){
        header("Location: login.php");
    }
    if( isset($_POST["logout"])){
        $_SESSION["Validasi"] = false;
        session_unset();
        session_destroy();
        header("Location: login.php");
    }
    if( isset($_GET["logout"])){
        $_SESSION["Validasi"] = false;
        session_unset();
        session_destroy();
        header("Location: login.php");
    }
    $rowEveryPage = 10;
    $pageSelected = (isset($_GET["page"])) ? $_GET['page'] : 1;
    $_GET["page"] = (isset($_GET["page"])) ? $_GET['page'] : 1;
    $totalData = count(query("SELECT * FROM tbl_mahasiswa"));
    $firstDataEveryPage = ($rowEveryPage * $pageSelected ) - $rowEveryPage;
    $totalPage = ceil($totalData / $rowEveryPage);
    $mahasiswa = query("SELECT * FROM tbl_mahasiswa LIMIT $firstDataEveryPage, $rowEveryPage");
    $i = $firstDataEveryPage + 1;
    
    if( isset($_POST['cari'])){
        // $mahasiswa = cari($_POST['keywords']);
        $mahasiswa = cari($_POST['keywords']);    
        $totalData = count($mahasiswa);
        $firstDataEveryPage = ($rowEveryPage * $pageSelected ) - $rowEveryPage;
        $totalPage = ceil($totalData / $rowEveryPage);
        $i = $firstDataEveryPage + 1;
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main</title>
    <link rel="stylesheet" href="../Style/main.css">
</head>
<body>
    <h1 text-align="center">Medical Assist Software</h1>
    <br>
    <div class="search-panel">
    <form action="" method="post">
        <input type="text" name="keywords"placeholder="Search" required>
        <button type="submit" name="cari">Cari</button>
        <a href="main.php?logout=true" style="float:right" name="logout" onclick="return confirm('anda yakin ingin logout?')">logout</a>
    </form>
    </div>
    
    <div style="table-card">
        <table  cellspacing="0" cellpadding="10">
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
            <?php foreach ($mahasiswa as $row) : ?>
            <tr class="data-table">
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
    </div>
        <form action="" method = "get">
            <?php if($totalPage != 1) :?>
                <?php if($_GET["page"] > 1) : ?>
                <a href="?page=<?=$prev = ($_GET["page"] - 1);?>">prev</a>
                <?php endif; ?>
                <?php for($j = 1; $j <= $totalPage; $j++) :?>
                    <?php if($j == $pageSelected) : ?>
                        <a href="?page=<?= $j ?> " style="font-weight: bold;color: red;" ><?= $j ?></a>
                    <?php else : ?>
                        <a href="?page=<?= $j ?> "><?= $j ?></a>
                    <?php endif; ?>
                <?php endfor; ?>
                <?php if($_GET["page"] >= 1) : ?>
                    <a href="?page=<?= $next = $_GET["page"] + 1;?>">next</a>
                <?php endif; ?>
            <?php endif; ?>
        </form>
</body>
</html>