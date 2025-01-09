<?php
    include('database/config.php');

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        // Persiapan hapus data
        $hapus = mysqli_query($conn, "DELETE FROM mahasiswa_51421587 WHERE id = '$_GET[id]' ");
        if ($hapus) {
            echo "<script>
                    alert('Hapus Data Sukses!');
                    document.location='index.php';
                 </script>";
        } else {
            echo "<script>
            alert('Gagal menghapus data!');
            window.location.href='index.php';
            </script>";
        }
    }
?>