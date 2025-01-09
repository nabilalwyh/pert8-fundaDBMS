<?php
include('database/config.php');
// jika submit di klik
if (isset($_POST['submit'])) {
    $submit = mysqli_query($conn, "INSERT INTO mahasiswa_51421587 (nama, npm, materi_kursus) VALUES ('$_POST[nama]', '$_POST[npm]', '$_POST[materi_kursus]')");

    if($submit) {
        echo "<script>
        alert('Simpan data sukses!');
        document.location='index.php';
        </script>";
    } else {
        echo "<script>
        alert('Simpan data gagal!');
        document.location='index.php';
        </script>";
    }
}
?>