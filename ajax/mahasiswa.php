<?php
    usleep(500000);//sudah di hosting harus dihapus
    require '../Function/function.php';
    $keywords = $_GET["keywords"];
    $rowEveryPage = 10;
    $_GET["page"] = (isset($_GET["page"])) ? $_GET['page'] : 1;
    $_POST["page"] = (isset($_POST["page"])) ? $_POST['page'] : 1;
    $pageSelected = (isset($_POST["page"])) ? $_POST['page'] : 1;
    if( isset($_POST["page"]) ){
        if( isset($keywords) ){
            $totalData = count(cariNoLimit($keywords));
            $firstDataEveryPage = ($rowEveryPage * $pageSelected ) - $rowEveryPage;
            $totalPage = ceil($totalData / $rowEveryPage);
            $mahasiswa = cariLimit($keywords,  $firstDataEveryPage, $rowEveryPage);
            $i = $firstDataEveryPage + 1;
        }else{
            $totalData = count(query("SELECT * FROM tbl_mahasiswa"));
            $firstDataEveryPage = ($rowEveryPage * $pageSelected ) - $rowEveryPage;
            $totalPage = ceil($totalData / $rowEveryPage);
            $mahasiswa = query("SELECT * FROM tbl_mahasiswa LIMIT $firstDataEveryPage, $rowEveryPage");
            $i = $firstDataEveryPage + 1;
        }

    }
    $i=1;
?>
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
    
    