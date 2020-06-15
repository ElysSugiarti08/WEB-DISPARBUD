<?php
$conn = mysqli_connect("localhost", "root","","lamongan");


function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while( $row = mysqli_fetch_assoc($result) ) {
        $rows[] = $row;   
    }
    return $rows;
}

function registrasi($data) {
    global $conn;

    $username = strtolower(stripslashes($data["username"]));
    $email = stripslashes($data["email"]);
    $jk = $data["jeniskelamin"];
    $noTelp = $data["noTelp"];
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password_repeat = mysqli_real_escape_string($conn, $data["password-repeat"]);

    //cek username tersedia
    $result = mysqli_query($conn, "SELECT username FROM users WHERE username = '$username'");
    
    if ( mysqli_fetch_assoc($result)) {
        echo "<script>
                alert('username sudah terdaftar!')
                </script>";
        return false;
    }

    //cek konfirmasi password
    if ( $password !== $password_repeat) {
        echo "<script>
                alert('konfirmasi password tidak sesuai!');
            </script>"; 
        return false;
    }

    //enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    //menambahkan user ke database
    mysqli_query($conn, "INSERT INTO users VALUES(NULL, '$username', '$email', '$password', $jk, '$noTelp', 2)");

    return mysqli_affected_rows($conn);
}



function hapususer($id) {
    global $conn;

    mysqli_query($conn, "DELETE FROM users WHERE id_user = $id");

    return mysqli_affected_rows($conn);
}




function ubahuser($data) {
    global $conn;

    $id = $data["id"];
    $username = htmlspecialchars($data["username"]);
    $email = htmlspecialchars($data["email"]);
    $jeniskelamin = htmlspecialchars($data["jeniskelamin"]);
    $notelp = htmlspecialchars($data["notelp"]);
    $usertype = htmlspecialchars($data["usertype"]);

    //menambahkan user ke database
    $query = "UPDATE users SET
                username = '$username',
                email = '$email',
                jenisKelamin = $jeniskelamin,
                noTelp = '$notelp',
                usertype = '$usertype'
                    
                WHERE id_user = $id
                    
                ";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

?>