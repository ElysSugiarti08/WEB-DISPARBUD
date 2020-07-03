<?php
session_start();

if( !isset($_SESSION["login"]) ) {
  header("Location: ../login.php");
  exit;
}

require '../functions.php';

$nama_file = $_FILES['gambar']['name'];
$ukuran_file = $_FILES['gambar']['size'];
$tipe_file = $_FILES['gambar']['type'];
$tmp_file = $_FILES['gambar']['tmp_name'];

$path = "../customer/images/".$nama_file;

if($tipe_file == "image/jpeg" || $tipe_file == "image/png"){ 
	
	if($ukuran_file <= 1000000){ 
		
		
		if(move_uploaded_file($tmp_file, $path)){ 
				
			
			$query = "INSERT INTO gambar(nama,ukuran,tipe) VALUES('".$nama_file."','".$ukuran_file."','".$tipe_file."')";
			$sql = mysqli_query($conn, $query); 
			
			if($sql){ 
				
				header("location: ../customer/index2.php"); 
			}else{
				
				echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
				echo "<br><a href='form.php'>Kembali Ke Form</a>";
			}
		}else{
			
			echo "Maaf, Gambar gagal untuk diupload.";
			echo "<br><a href='form.php'>Kembali Ke Form</a>";
		}
	}else{
		
		echo "Maaf, Ukuran gambar yang diupload tidak boleh lebih dari 1MB";
		echo "<br><a href='form.php'>Kembali Ke Form</a>";
	}
}else{
	
	echo "Maaf, Tipe gambar yang diupload harus JPG / JPEG / PNG.";
	echo "<br><a href='form.php'>Kembali Ke Form</a>";
}
?>
