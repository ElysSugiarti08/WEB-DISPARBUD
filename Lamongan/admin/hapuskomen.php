<?php

require '../functions.php';
$id = $_GET['id'];

if ( hapuskomen($id) > 0) {
    echo "
        <script>
            alert('komentar berhasil dihapus!');
            document.location.href = 'komenuser.php';
        </script>
    "; 
} else {
    echo "
        <script>
            alert('komentar gagal dihapus!');
            document.location.href = 'komenuser.php';
        </script>
    ";
}
?>