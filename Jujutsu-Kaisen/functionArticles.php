<?php
include "connecton.php";

//Top 3 articles
function getTopArticles() {
    global $conn;
    $query = "SELECT * FROM article ORDER BY article_release DESC LIMIT 3";
    return mysqli_query($conn, $query);
}

function getTopArticlesinSeason() {
    global $conn;
    $query = "SELECT * FROM article ORDER BY article_release DESC LIMIT 5";
    return mysqli_query($conn, $query);
}

//Semua articles
function getAllArticles() {
    global $conn;
    //--PAGENATION--//
    $jumlahDataPerHalaman = 5;
    $query = "SELECT COUNT(*) as total FROM article";
    $result = mysqli_query($conn, $query);
    $data = mysqli_fetch_assoc($result);
    $jumlahData = $data['total'];
    $jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
    $halamanAktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
    $awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;
    $query = "SELECT * FROM article ORDER BY article_release DESC LIMIT $awalData, $jumlahDataPerHalaman";
    $articles = mysqli_query($conn, $query);
    return array($articles, $jumlahHalaman, $halamanAktif);
}
?>