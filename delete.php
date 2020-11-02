<?php
session_start();
if (!isset($_SESSION['login'])){
  header ("location: login.php");
  exit;
}
//include file config.php
include('config.php');

//jika benar mendapatkan GET id dari URL
if(isset($_GET['id_pelanggan'])){
	//membuat variabel $id yang menyimpan nilai dari $_GET['id']
	$id_pelanggan = $_GET['id_pelanggan'];

	//melakukan query ke database, dengan cara SELECT data yang memiliki id yang sama dengan variabel $id
	$cek = mysqli_query($koneksi, "SELECT * FROM installasi WHERE id_pelanggan='$id_pelanggan'") or die(mysqli_error($koneksi));

$row= mysqli_fetch_array($cek);
unlink("images/$row[gambarsatu]");
unlink("images/$row[gambardua]");
unlink("images/$row[gambartiga]");
unlink("images/$row[gambarempat]");
	//jika query menghasilkan nilai > 0 maka eksekusi script di bawah
	if(mysqli_num_rows($cek) > 0){
		//query ke database DELETE untuk menghapus data dengan kondisi id=$id
		$del = mysqli_query($koneksi, "DELETE FROM installasi WHERE id_pelanggan='$id_pelanggan'") or die(mysqli_error($koneksi));
		if($del){
		
			echo '<script>alert("Berhasil menghapus data."); document.location="index.php?page=tampil_installasi";</script>';
		}else{
			echo '<script>alert("Gagal menghapus data."); document.location="index.php?page=tampil_installasi";</script>';
		}
	}else{
		echo '<script>alert("ID tidak ditemukan di database."); document.location="index.php?page=tampil_installasi";</script>';
	}
}else{
	echo '<script>alert("ID tidak ditemukan di database."); document.location="index.php?page=tampil_installasi";</script>';
}

?>
