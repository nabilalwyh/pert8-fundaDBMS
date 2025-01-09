<?php
    include('database/config.php');

    if (isset($_POST['submit'])) {
        $id = $_POST['id'];
        $nama = $_POST['nama'];
        $npm = $_POST['npm'];
        $materi_kursus = $_POST['materi_kursus'];

        $update_query = "UPDATE mahasiswa_51421587 SET nama='$nama', npm='$npm', materi_kursus='$materi_kursus' WHERE id=$id";

        if (mysqli_query($conn, $update_query)) {
            echo "<script>
                    alert('Data berhasil diperbarui!');
                    window.location.href='index.php';
                </script>";
        } else {
            echo "<script>
                    alert('Gagal memperbarui data. Silakan coba lagi!');
                    window.location.href='index.php';
                </script>";
        }
    } else {
        $id = $_GET['id'];
        $fetch_data_query = "SELECT * FROM mahasiswa_51421587 WHERE id=$id";
        $result = mysqli_query($conn, $fetch_data_query);
        $data = mysqli_fetch_assoc($result);

        if (!$data) {
            echo "Data tidak ditemukan!";
            exit;
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mx-auto px-4 py-8">
        <h1 class="fs-3 fw-medium mb-4">Update Mahasiswa</h1>
        
        <form action="update.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
            <div class="mb-4">
                <label for="nama" class="block">Nama:</label>
                <input type="text" name="nama" id="nama" class="form-control" value="<?php echo $data['nama']; ?>" required>
            </div>
            <div class="mb-4">
                <label for="npm" class="block">NPM:</label>
                <input type="text" name="npm" id="npm" class="form-control" value="<?php echo $data['npm']; ?>" required>
            </div>
            <div class="mb-4">
                <label for="materi_kursus" class="block">Materi Kursus:</label>
                <textarea name="materi_kursus" id="materi_kursus" rows="5" class="form-control" required><?php echo $data['materi_kursus']; ?></textarea>
            </div>
            <div>
                <button type="submit" name="submit" class="btn btn-success">Update</button>
                <a href="index.php" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</body>
</html>