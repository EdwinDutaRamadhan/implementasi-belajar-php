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
    function cari($keywords){
        $query = "SELECT * FROM tbl_mahasiswa
                WHERE
                NIM = '$keywords' 
                ";
        return query($query);
    }
?>