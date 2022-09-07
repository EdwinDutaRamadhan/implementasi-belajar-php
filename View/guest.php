<?php
    session_start();
    require '../Function/function.php';
    $rowEveryPage = 10;
    $_GET["page"] = (isset($_GET["page"])) ? $_GET['page'] : 1;
    $_POST["page"] = (isset($_POST["page"])) ? $_POST['page'] : 1;
    $pageSelected = (isset($_POST["page"])) ? $_POST['page'] : 1;
    
    if( isset($_POST["page"]) ){
        if( isset($_GET["s"]) ){
            $nim = $_GET["s"];
            $totalData = count(cariNoLimit($_GET["s"]));
            $firstDataEveryPage = ($rowEveryPage * $pageSelected ) - $rowEveryPage;
            $totalPage = ceil($totalData / $rowEveryPage);
            $mahasiswa = cariLimit($_GET["s"],  $firstDataEveryPage, $rowEveryPage);
            $i = $firstDataEveryPage + 1;
        }else{
            $totalData = count(query("SELECT * FROM tbl_mahasiswa"));
            $firstDataEveryPage = ($rowEveryPage * $pageSelected ) - $rowEveryPage;
            $totalPage = ceil($totalData / $rowEveryPage);
            $mahasiswa = query("SELECT * FROM tbl_mahasiswa LIMIT $firstDataEveryPage, $rowEveryPage");
            $i = $firstDataEveryPage + 1;
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
    <link rel="stylesheet" type="text/css" href="../Style/guest2.css">
</head>
<body>
    <div class="title"><h1 text-align="center">Medical Assist Software</h1></div>
    <br>
    <div class="search-panel" >
        <form action="" method="get">
            <input type="text" name="s"placeholder="Search" required>
            <button type="submit" >Cari</button>
        </form>
    </div>
    
    <div class="table-card">
        <table cellspacing="0" cellpadding="10">
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
            <tr class="data-table" >
                <td><?= $i; ?></td>
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
    <div class="navigator" >
        <form action="" method = "post">
            <?php if ($pageSelected > 1) : ?>
                <button type="submit" name="page" value ="<?= $_POST["page"] = $pageSelected - 1; ?>" >&larr;</button>
            <?php endif; ?>
            <?php if($totalPage != 1) : ?>
                <?php for($i = 1; $i <= $totalPage; $i++) : ?>
                    <?php if($i == $pageSelected) : ?>
                        <button type="submit" name="page" value = "<?= $_POST["page"] = $i; ?>" style="color:red;" ><?= $i; ?></button>
                    <?php else : ?>
                        <button type="submit" name="page" value = "<?= $_POST["page"] = $i; ?>"><?= $i; ?></button>
                    <?php endif; ?>

                <?php endfor; ?>
            <?php endif; ?>
            <?php if ($pageSelected < $totalPage) : ?>
                <button type="submit" name="page" value ="<?= $_POST["page"] = $pageSelected + 1; ?>" >&rarr;</button>
            <?php endif; ?>
        </form>
    </div>
</body>
</html>