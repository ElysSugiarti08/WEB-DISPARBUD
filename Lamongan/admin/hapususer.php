<?php

require '../functions.php';
$id = $_GET["id"];

if ( hapususer($id) > 0) {
    echo "
        <script>
            alert('user berhasil dihapus!');
            document.location.href = 'datauser.php';
        </script>
    "; 
} else {
    echo "
        <script>
            alert('user gagal dihapus!');
            document.location.href = 'datauser.php';
        </script>
    ";
}
?>