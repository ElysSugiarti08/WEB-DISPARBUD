<html>
<head>
	<title>Galeri Disparbud lamongan</title>
</head>
<body>
<h1 align="center">GALERI DISPARBUD LAMONGAN</h1><hr>
<?php
session_start();

if( !isset($_SESSION["login"]) ) {
  header("Location: ../login.php");
  exit;
}

require '../functions.php';

$query = "SELECT * FROM gambar"; 
$sql = mysqli_query($conn, $query); 
$row = mysqli_num_rows($sql); 

if($row > 0){ 
	while($data = mysqli_fetch_array($sql)){ 
		echo "<tr>";
		echo "<td><img src='images/".$data['nama']."' width='500' height='300'></td>";
		echo "</tr>";
	}
}else{
	echo "<tr><td colspan='4'>Data tidak ada</td></tr>";
}
?>
</body>
</html>
