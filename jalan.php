<?php

$koneksi = mysqli_connect("localhost","root","","ujicoba");
session_start();

error_reporting(E_ALL ^ (E_NOTICE | E_WARNING)); //kadang ada error sebenernya bukan error, ada notifikasi error sebenernya gak error, melaporkan semua peringatan dan warning jadi supaya error yg gak perlu ilang
$sql        = mysqli_query($koneksi,"select * from buku");
$id_buku    = $_SESSION['id_buku'];
$edit       = mysqli_query($koneksi,"select * from buku where id_buku='$id_buku'");

if (isset($_POST['proses-tambah'])) {
    $_SESSION['fungsi'] = "tambah-buku";
}

if (isset($_POST['proses-edit'])) {
    $_SESSION['fungsi']     = "edit-buku";
    $_SESSION['id_buku']    = $_POST["id_buku"];
}

if (isset($_POST['tambah'])) {
    $judul      = $_POST['judul'];
    $pengarang  = $_POST['pengarang'];
    $penerbit   = $_POST['penerbit'];
    $kota       = $_POST['kota'];
    $tahun      = $_POST['tahun'];
    $_SESSION['fungsi'] = "muncul";
    mysqli_query($koneksi,"INSERT INTO buku VALUES('','$judul','$pengarang','$penerbit,'$kota,'$tahun')");
    header('location:index.php');
}

if (isset($_POST['edit-aja'])) {
    $id_buku    = $_SESSION ['id_buku'];
    $judul      = $_POST    ['judul'];
    $pengarang  = $_POST    ['pengarang'];
    $penerbit   = $_POST    ['penerbit'];
    $kota       = $_POST    ['kota'];
    $tahun      = $_POST    ['tahun'];
    $_SESSION['fungsi'] = "muncul";
    mysqli_query($koneksi,"UPDATE buku SET judul='$judul', pengarang='$pengarang', penerbit='$penerbit', kota='$kota', tahun='$tahun' WHERE id_buku='$id_buku'");
    header('location:index.php');
}

if (isset($_POST['hapus'])) {
    $id_buku = $_POST['id_buku'];
    $_SESSION['fungsi'] = "muncul";
    mysqli_query($koneksi,"DELETE FROM buku WHERE id_buku='$id_buku'");
    header('location:index.php');
}
?>