<?php
    $conn = mysqli_connect("localhost","root","","db_pedes");
    if(!$conn){
        echo mysqli_error($conn);
    }
    function query($querys){
        global $conn;
        $result = mysqli_query($conn, $querys);
        $rows = [];
        while ( $row = mysqli_fetch_assoc($result)){
            $rows[] = $row;
        }
        return $rows;
    }
    function hapus($NIM){
        global $conn;
        $query = "DELETE FROM tbl_mahasiswa WHERE NIM = '$NIM'";

        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    }
    function cari($keywords){
        $query = "SELECT * FROM tbl_mahasiswa
                WHERE
                NIM LIKE '%$keywords%' OR
                Nama LIKE '%$keywords%' OR
                Vaksin1 LIKE '%$keywords%' OR
                Vaksin2 LIKE '%$keywords%' OR
                Vaksin3 LIKE '%$keywords%' OR
                Vaksin4 LIKE '%$keywords%' OR
                Vaksin5 LIKE '%$keywords%'
                ";
        return query($query);
    }
    function tambah($data){
        global $conn;
        $NIM = htmlspecialchars($data['nim']);
        $Nama = htmlspecialchars($data['nama']);
        $Vaksin1 = htmlspecialchars($data['vaksin-1']);
        $Vaksin2 = htmlspecialchars($data['vaksin-2']);
        $Vaksin3 = htmlspecialchars($data['vaksin-3']);
        $Vaksin4 = htmlspecialchars($data['vaksin-4']);
        $Vaksin5 = htmlspecialchars($data['vaksin-5']);
        $query = "INSERT INTO tbl_mahasiswa VALUES
        ('$NIM','$Nama','$Vaksin1','$Vaksin2','$Vaksin3','$Vaksin4','$Vaksin5')";
        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    }
?>